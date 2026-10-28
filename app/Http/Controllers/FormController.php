<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Support\PackageCatalog;

class FormController extends Controller
{

    public function openDrongoERPform(Request $request){
        $pageData = array(
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'welcomePage'
        );
        $requestType = $request->query('requestType', 'newSystem');

        return view('getStartedPages.form', compact('requestType'))->with($pageData);
    }

    public function choosePlan(){
        $accountDetails = session()->get('signup_data', []);
        session(['accountDetails' => $accountDetails]); 

        $pageData = array(
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'choosePlan'
        );

        return view('getStartedPages.choosePlan', compact('accountDetails'))->with($pageData);
    }

    public function openDrongoERPchoosePackage(){
        $accountDetails = session()->get('accountDetails'); 

        $pageData = array(
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'choosePackage'
        );

        return view('getStartedPages.choosePackage', compact('accountDetails'))->with($pageData);
    }

    public function openDrongoERPfinalPage(Request $request) {

        $companyProfileId = $request->input('companyProfileId'); 
        $accountDetails = $request->input('accountDetails', []);
        $selectedPackage = session('selected_package'); 


        $companyProfile = CompanyProfile::find($companyProfileId);

        $pageData = array(
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'page5'
        );
        
        return view('getStartedPages.finalPage', compact('companyProfile', 'accountDetails', 'selectedPackage'))->with($pageData);
    }
    
    public function getStarted(Request $request){
        // Arriving from a pricing card preselects that plan; a plain visit clears any earlier choice.
        $package = $request->query('package');
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
