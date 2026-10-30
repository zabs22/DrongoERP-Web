<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Support\PackageCatalog;

class FormController extends Controller
{
    public function openDrongoERPchoosePackage(){
        if (auth()->user()?->companyProfile) {
            return redirect()->route('dashboard');
        }

        $pageData = array(
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'choosePackage'
        );

        return view('getStartedPages.choosePackage')->with($pageData);
    }

    public function openDrongoERPfinalPage() {
        $companyProfile = auth()->user()?->companyProfile;

        if (!$companyProfile) {
            return redirect()->route('DrongoERP.getStarted');
        }

        $accountDetails = [
            'email' => $companyProfile->email,
            'company_name' => $companyProfile->companyName,
        ];
        $selectedPackage = $companyProfile->selectedPackage
            ?? ($companyProfile->requestedPackage ? $companyProfile->requestedPackage . ' (requested)' : null);

        $pageData = array(
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'page5'
        );
        
        return view('getStartedPages.finalPage', compact('companyProfile', 'accountDetails', 'selectedPackage'))->with($pageData);
    }
    
    public function getStarted(Request $request){
        $package = $request->query('package');

        // Signed-up companies already gave their details: send them to the plan instead of the form.
        if ($request->user()?->companyProfile) {
            $slug = PackageCatalog::slugForName($package);

            return $slug ? redirect()->route('DrongoERP.package', $slug) : redirect()->route('dashboard');
        }

        // Arriving from a pricing card preselects that plan; a plain visit clears any earlier choice.
        if (in_array($package, PackageCatalog::names(), true)) {
            session(['selected_package' => $package]);
            // A module selection made on another plan's page no longer applies.
            if (session('total_amount.package') !== $package) {
                session()->forget('total_amount');
            }
        } elseif (!$request->session()->has('errors')) {
            session()->forget(['selected_package', 'total_amount']);
        }

        $pageData = array(
            'pageTitle' => 'Get Started with DrongoERP — Convenience at your fingertips!',
            'page' => 'getStarted'
        );

        return view('getStartedPages.getStarted', [
            'selectedPackage' => session('selected_package'),
        ])->with($pageData);
    }
}
