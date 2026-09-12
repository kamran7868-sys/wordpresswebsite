<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| General & Informational Page Routes
|--------------------------------------------------------------------------
*/
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/register-dmc', 'registerDmc')->name('register-dmc');
});

/*
|--------------------------------------------------------------------------
| Package Catalog & Detail Routes
|--------------------------------------------------------------------------
*/
Route::controller(PackageController::class)->group(function () {
    Route::get('/packages', 'index')->name('packages');
    Route::get('/explore-packages', 'explore')->name('explore-packages');
    Route::get('/stay-detail', 'stayDetail')->name('stay-detail');
    Route::get('/voyage-detail', 'voyageDetail')->name('voyage-detail');
});

/*
|--------------------------------------------------------------------------
| API & Inquiry Endpoints
|--------------------------------------------------------------------------
*/
Route::get('/api/airports', [AirportController::class, 'search'])->name('api.airports');
Route::post('/airline-ticketing-inquiry', [InquiryController::class, 'airlineTicketing'])->name('airline-ticketing-inquiry');
