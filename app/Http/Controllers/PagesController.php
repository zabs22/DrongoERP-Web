<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function openDrongoERPHomepage() {
        $pageData = array (
            'pageTitle' => 'DrongoERP — Convenience at your fingertips!',
            'page' => 'home'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPAboutpage() {
        $pageData = array (
            'pageTitle' => 'About DrongoERP — Leading Cloud-based ERP Software',
            'page' => 'about'
        );
        
        return view('homepage.about')->with($pageData);
    }

    public function openDrongoERPServicespage() {
        $pageData = array (
            'pageTitle' => 'DrongoERP Services — Convenience at your fingertips!',
            'page' => 'services'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPPricingpage() {
        $pageData = array (
            'pageTitle' => 'DrongoERP Pricing — Convenience at your fingertips!',
            'page' => 'pricing'
        );
        
        return view('homepage.pricing')->with($pageData);
    }

    public function openDrongoERPContactpage() {
        $pageData = array (
            'pageTitle' => 'Contact DrongoERP — Convenience at your fingertips!',
            'page' => 'contact'
        );
        
        return view('homepage.contact')->with($pageData);
    }

    public function openDrongoERPNewspage() {
        $pageData = array (
            'pageTitle' => 'News DrongoERP — Convenience at your fingertips!',
            'page' => 'news'
        );
        
        return view('homepage.news')->with($pageData);
    }

    public function openDrongoERPInstructionspage() {
        $pageData = array (
            'pageTitle' => 'DrongoERP Instructions — Convenience at your fingertips!',
            'page' => 'instruction'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPCareerspage() {
        $pageData = array (
            'pageTitle' => 'DrongoERP Vacancy — Convenience at your fingertips!',
            'page' => 'careers'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }
}
