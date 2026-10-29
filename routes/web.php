<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\LiveDemoViewerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DashboardController;
use App\Support\Geo;
use App\Models\LiveDemoViewer;
use Faker\Provider\ar_EG\Company;

Route::get('/', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.home');
Route::get('/contact', [PagesController::class, 'openDrongoERPContactpage'])->name('DrongoERP.contact');

// The homepage is a single scrollable page; these keep old URLs working by jumping to their section.
Route::get('/about', fn () => redirect(route('DrongoERP.home') . '#about'))->name('DrongoERP.about');
Route::get('/services', fn () => redirect(route('DrongoERP.home') . '#services'))->name('DrongoERP.services');
Route::get('/pricing', fn () => redirect(route('DrongoERP.home') . '#pricing'))->name('DrongoERP.pricing');
Route::get('/news', fn () => redirect(route('DrongoERP.home') . '#testimonials'))->name('DrongoERP.news');
Route::get('/instructions', fn () => redirect(route('DrongoERP.home') . '#faq'))->name('DrongoERP.instructions');
Route::get('/careers', fn () => redirect()->route('DrongoERP.contact'))->name('DrongoERP.careers');

Route::get('/testimonial', [PagesController::class, 'openDrongoERPtestimonial'])->name('DrongoERP.testimonial');
Route::get('/apps', [PagesController::class, 'openDrongoERPapps'])->name('DrongoERP.apps');
Route::get('/appsDetail/{id}', [PagesController::class, 'openDrongoERPappsDetail'])->name('DrongoERP.appsDetail');

Route::get('/form', [FormController::class, 'openDrongoERPform'])->name('DrongoERP.form');
Route::get('/choose-plan', [FormController::class, 'choosePlan'])->name('DrongoERP.choosePlan');
Route::get('/choosePackage', [FormController::class, 'openDrongoERPchoosePackage'])->name('DrongoERP.choosePackage');
Route::get('/finalPage', [FormController::class, 'openDrongoERPfinalPage'])->name('DrongoERP.finalPage');
Route::get('/get-started', [FormController::class, 'getStarted'])->name('DrongoERP.getStarted');
Route::get('/geo/cities/{code}', fn (string $code) => response()->json(Geo::cities($code))->setPublic()->setMaxAge(86400))
    ->where('code', '[A-Za-z]{2}')->name('DrongoERP.cities');
Route::post('/get-started', [CompanyProfileController::class, 'submitGetStarted'])->name('form.submitGetStarted');
Route::post('/get-started/check', [CompanyProfileController::class, 'checkContact'])
    ->middleware('throttle:60,1')->name('form.checkContact');

// Old sign-up URLs, kept so existing links still land on the right page.
Route::redirect('/register', '/get-started');
Route::get('/card{step}', fn (\Illuminate\Http\Request $request) => redirect()->route('DrongoERP.getStarted', $request->query()))->whereNumber('step');
Route::get('/twoCard', fn () => redirect()->route('DrongoERP.choosePlan'));

Route::get('/submitChosenPackage/{package}', [CompanyProfileController::class, 'submitChosenPackage'])->name('DrongoERP.submitChosenPackage');
Route::get('/submitSeeMore/{package}/{page?}', [CompanyProfileController::class, 'submitSeeMore'])->name('DrongoERP.submitSeeMore');
Route::get('/finalSubmit', [CompanyProfileController::class, 'finalSubmit'])->name('DrongoERP.finalSubmit');
Route::post('/createCompanyProfile', [CompanyProfileController::class, 'createCompanyProfile'])->name('form.create');

Route::post('/liveDemoViewerSubmit', [LiveDemoViewerController::class, 'liveDemoViewerSubmit'])->name('DrongoERP.liveDemoViewerSubmit');
Route::post('/contactMessage', [LiveDemoViewerController::class, 'contactMessage'])->name('DrongoERP.contactMessage');

Route::get('/packages/{slug}', [PackageController::class, 'show'])->name('DrongoERP.package');
Route::post('/packages/{slug}', [PackageController::class, 'select'])->name('DrongoERP.package.select');
Route::get('/exchange-rates', [PackageController::class, 'rates'])->name('DrongoERP.exchangeRates');

// Old package detail URLs.
foreach (['page1' => 'shop', 'page2' => 'startup', 'page3' => 'factory', 'page4' => 'enterprise', 'page5' => 'special'] as $old => $slug) {
    Route::get("/{$old}", fn () => redirect()->route('DrongoERP.package', $slug));
}

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified', // Email verification disabled for now.
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/upgrade', [DashboardController::class, 'plans'])->name('upgrade');
    Route::post('/dashboard/upgrade', [DashboardController::class, 'upgrade'])->name('dashboard.upgrade');
    Route::delete('/dashboard/upgrade-request', [DashboardController::class, 'cancelRequest'])->name('dashboard.cancelRequest');
});
