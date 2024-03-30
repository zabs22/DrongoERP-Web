<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.home');
Route::get('/about', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.about');
Route::get('/services', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.services');
Route::get('/pricing', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.pricing');
Route::get('/contact', [PagesController::class, 'openDrongoERPContactpage'])->name('DrongoERP.contact');
Route::get('/news', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.news');
Route::get('/instructions', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.instructions');
Route::get('/careers', [PagesController::class, 'openDrongoERPHomepage'])->name('DrongoERP.careers');