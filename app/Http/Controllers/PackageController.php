<?php

namespace App\Http\Controllers;

use App\Services\ExchangeRates;
use App\Support\PackageCatalog;
use App\Support\PlanChange;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    public function show(string $slug)
    {
        $package = PackageCatalog::find($slug) ?? abort(404);
        $signup = session('signup_data');
        $company = auth()->user()?->companyProfile;

        // Signed-up companies change their own plan here instead of starting a new sign-up.
        $accountAction = null;
        $currentModules = null;
        if ($company) {
            $isCurrent = $company->selectedPackage === $package['name'];
            $accountAction = match (PlanChange::kind($company, $slug)) {
                null => 'blocked',
                PlanChange::REQUEST => 'request',
                default => $isCurrent ? 'update' : 'switch',
            };
            if ($isCurrent && !empty($company->totalAmount['modules'])) {
                $currentModules = $company->totalAmount['modules'];
            }
        }

        // Startup has one module set per business type; open the one matching the sign-up answers.
        $sectionKeys = array_column($package['sections'], 'key');
        $natures = (array) ($signup['businessType'] ?? $company?->businessType ?? []);
        $activeSection = match (true) {
            $currentModules && in_array($company->totalAmount['section'] ?? null, $sectionKeys, true) => $company->totalAmount['section'],
            in_array('manufacturing', $natures, true) && in_array('manufacturing', $sectionKeys, true) => 'manufacturing',
            in_array('service', $natures, true) && in_array('service', $sectionKeys, true) => 'service',
            default => $sectionKeys[0],
        };

        $pageData = array(
            'pageTitle' => $package['name'] . ' Package — Droongo',
            'page' => 'package'
        );

        return view('getStartedPages.package', [
            'package' => $package,
            'activeSection' => $activeSection,
            'inSignup' => (bool) $signup && !$company,
            'company' => $company,
            'accountAction' => $accountAction,
            'currentModules' => $currentModules,
        ])->with($pageData);
    }

    public function select(Request $request, string $slug)
    {
        $package = PackageCatalog::find($slug) ?? abort(404);

        $validated = $request->validate([
            'section' => ['required', Rule::in(array_column($package['sections'], 'key'))],
            'modules' => 'required|array|min:1',
            'modules.*' => 'string',
        ], [
            'modules.required' => 'Select at least one module.',
        ]);

        // The total is recomputed here from the package data; the browser's figure is never trusted.
        $selection = PackageCatalog::price($package, $validated['section'], $validated['modules']);

        if ($company = $request->user()?->companyProfile) {
            if (!PlanChange::kind($company, $slug)) {
                return back()->withErrors(['modules' => 'To move to a smaller plan, please contact our team.']);
            }

            return redirect()->route('dashboard')
                ->with('flash.banner', PlanChange::apply($company, $slug, $selection));
        }

        session([
            'selected_package' => $package['name'],
            'total_amount' => ['package' => $package['name'], 'currency' => config('packages.base_currency')] + $selection,
        ]);

        // Mid sign-up: finish now. Otherwise collect the company details first, keeping this selection.
        if (session('signup_data')) {
            return redirect()->route('DrongoERP.finalSubmit');
        }

        return redirect()->route('DrongoERP.getStarted', ['package' => $package['name']]);
    }

    public function rates(ExchangeRates $rates)
    {
        return response()->json($rates->current());
    }
}
