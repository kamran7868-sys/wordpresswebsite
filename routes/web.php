<?php

use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DmcController as AdminDmcController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\AuthController;
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
    Route::post('/contact', 'submitContact')->name('contact.submit');
    Route::get('/register-dmc', 'registerDmc')->name('register-dmc');
    Route::post('/register-dmc', 'submitRegisterDmc')->name('register-dmc.submit');
});

/*
|--------------------------------------------------------------------------
| Package Catalog & Detail Routes (Public)
|--------------------------------------------------------------------------
*/
Route::controller(PackageController::class)->group(function () {
    Route::get('/packages', 'index')->name('packages');
    Route::get('/explore-packages/{slug?}', 'explore')->name('explore-packages');
    Route::get('/stay-detail/{slug?}', 'stayDetail')->name('stay-detail');
    Route::get('/voyage-detail/{slug?}', 'voyageDetail')->name('voyage-detail');
    Route::get('/package/{slug}', 'show')->name('package.show');
});

/*
|--------------------------------------------------------------------------
| API & Inquiry Endpoints (Public)
|--------------------------------------------------------------------------
*/
Route::get('/api/airports', [AirportController::class, 'search'])->name('api.airports');
Route::post('/airline-ticketing-inquiry', [InquiryController::class, 'airlineTicketing'])->name('airline-ticketing-inquiry');

/*
|--------------------------------------------------------------------------
| SEO Sitemap Route (Public)
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', function () {
    $sitemapPath = public_path('sitemap.xml');
    if (!file_exists($sitemapPath)) {
        \Illuminate\Support\Facades\Artisan::call('sitemap:generate');
    }
    return response(file_get_contents($sitemapPath), 200, [
        'Content-Type' => 'application/xml; charset=utf-8',
    ]);
})->name('sitemap');

/*
|--------------------------------------------------------------------------
| Staff Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PGE Management & Admin Routes (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Module 1 — Dashboard Overview
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Module 2 — Package Management
    Route::prefix('packages')->name('packages.')->controller(AdminPackageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/check-slug', 'checkSlug')->name('check-slug');
        Route::get('/{package}/edit', 'edit')->name('edit');
        Route::put('/{package}', 'update')->name('update');
        Route::delete('/{package}', 'destroy')->name('destroy');
        Route::patch('/{package}/status', 'status')->name('status');
    });

    // Module 3 — Flight Inquiries
    Route::prefix('inquiries')->name('inquiries.')->controller(AdminInquiryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{inquiry}', 'show')->name('show');
        Route::patch('/{inquiry}', 'update')->name('update');
    });

    // Module 4 — Contact Messages
    Route::prefix('contacts')->name('contacts.')->controller(AdminContactController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{contact}', 'show')->name('show');
        Route::patch('/{contact}', 'update')->name('update');
        Route::post('/{contact}/reply', 'reply')->name('reply');
    });

    // Module 5 — DMC Registrations
    Route::prefix('dmc-registrations')->name('dmc.')->controller(AdminDmcController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{dmc}', 'show')->name('show');
        Route::patch('/{dmc}', 'update')->name('update');
    });
});
