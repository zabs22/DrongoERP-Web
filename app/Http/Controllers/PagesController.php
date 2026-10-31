<?php

namespace App\Http\Controllers;

use App\Support\AppCatalog;
use Illuminate\Http\Request;
use App\Models\App; 

class PagesController extends Controller
{
    //
    public function openDrongoERPHomepage() {
        $pageData = array (
            'pageTitle' => 'Droongo — Convenience at your fingertips!',
            'page' => 'home'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPAboutpage() {
        $pageData = array (
            'pageTitle' => 'About Droongo — Leading Cloud-based ERP Software',
            'page' => 'about'
        );
        
        return view('homepage.about')->with($pageData);
    }

    public function openDrongoERPServicespage() {
        $pageData = array (
            'pageTitle' => 'Droongo Services — Convenience at your fingertips!',
            'page' => 'services'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPPricingpage() {
        $pageData = array (
            'pageTitle' => 'Droongo Pricing — Convenience at your fingertips!',
            'page' => 'pricing'
        );
        
        return view('homepage.pricing')->with($pageData);
    }

    public function openDrongoERPContactpage() {
        $pageData = array (
            'pageTitle' => 'Contact Droongo — Convenience at your fingertips!',
            'page' => 'contact'
        );
        
        return view('homepage.contact')->with($pageData);
    }

    public function openDrongoERPNewspage() {
        $pageData = array (
            'pageTitle' => 'News Droongo — Convenience at your fingertips!',
            'page' => 'news'
        );
        
        return view('homepage.news')->with($pageData);
    }

    public function openDrongoERPInstructionspage() {
        $pageData = array (
            'pageTitle' => 'Droongo Instructions — Convenience at your fingertips!',
            'page' => 'instruction'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPCareerspage() {
        $pageData = array (
            'pageTitle' => 'Droongo Vacancy — Convenience at your fingertips!',
            'page' => 'careers'
        );
        
        return view('homepage.indexPage')->with($pageData);
    }

    public function openDrongoERPtestimonial(){
        $pageData = array(
            'pageTitle' => 'Droongo Vacancy — Convenience at your fingertips!',
            'page' => 'Testimonial'
        );

        return view('homePage.testimonial')->with($pageData);
    }

    public function openDrongoERPapps(){
        $pageData = array(
            'pageTitle' => 'Droongo Vacancy — Convenience at your fingertips!',
            'page' => 'Apps'
        );

        return view('homePage.apps')->with($pageData);
    }

    public function openDrongoERPappsDetail($id){
        $app = AppCatalog::find((int) $id) ?? abort(404);
        $pageData = array(
            'pageTitle' => $app['title'] . ' — Droongo',
            'page' => 'AppsDetail'
        );

        return view('homepage.app_page', compact('app'))->with($pageData);
    }

    
}
