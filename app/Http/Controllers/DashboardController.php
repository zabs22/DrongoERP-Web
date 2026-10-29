<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Support\PackageCatalog;
use App\Support\PlanChange;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $company = $request->user()->companyProfile;
        $currentSlug = PackageCatalog::slugForName($company?->selectedPackage);
        $package = $currentSlug ? PackageCatalog::find($currentSlug) : null;

        return view('dashboard', [
            'company' => $company,
            'currentPlan' => $currentSlug ? PackageCatalog::plans()[$currentSlug] : null,
            'perks' => $package['perks'] ?? [],
            'included' => $package ? $this->included($package, $company) : ['areas' => [], 'addons' => []],
            'hasUpgrades' => (bool) PlanChange::upgrades($company),
        ]);
    }

    public function plans(Request $request)
    {
        $company = $request->user()->companyProfile;
        $plans = PackageCatalog::plans();
        $currentSlug = PackageCatalog::slugForName($company?->selectedPackage);

        return view('dashboard.upgrade', [
            'company' => $company,
            'plans' => $plans,
            'currentPlan' => $currentSlug ? $plans[$currentSlug] : null,
            'upgrades' => PlanChange::upgrades($company),
        ]);
    }

    public function upgrade(Request $request)
    {
        $company = $request->user()->companyProfile ?? abort(403);

        $validated = $request->validate([
            'plan' => ['required', Rule::in(array_keys(PlanChange::upgrades($company)))],
        ]);

        return redirect()->route('upgrade')
            ->with('flash.banner', PlanChange::apply($company, $validated['plan']));
    }

    public function cancelRequest(Request $request)
    {
        $company = $request->user()->companyProfile ?? abort(403);
        $requested = $company->requestedPackage;

        $company->update(['requestedPackage' => null, 'requestedAmount' => null, 'upgradeRequestedAt' => null]);

        return redirect()->route('upgrade')
            ->with('flash.banner', $requested ? "Your request for the {$requested} plan was cancelled." : 'There was no pending request.');
    }

    /**
     * The company's modules summarised by area (group) for the dashboard: picked modules
     * when it chose its own, otherwise the plan's standard set.
     *
     * @return array{areas: array<int, array{name: string, count: int, total: int}>, addons: string[]}
     */
    private function included(array $package, CompanyProfile $company): array
    {
        $picked = $company->totalAmount['modules'] ?? [];
        $sectionKey = $company->totalAmount['section'] ?? $package['sections'][0]['key'];
        $section = collect($package['sections'])->firstWhere('key', $sectionKey) ?? $package['sections'][0];
        $has = fn ($module) => $picked ? in_array($module['name'], $picked, true) : $module['default'];

        $areas = [];
        foreach ($section['groups'] as $group) {
            if ($group['modules']) {
                $areas[] = [
                    'name' => $group['name'],
                    'count' => count(array_filter($group['modules'], $has)),
                    'total' => count($group['modules']),
                ];
            }
        }

        return [
            'areas' => $areas,
            'addons' => array_column(array_filter($section['addons'], $has), 'name'),
        ];
    }
}
