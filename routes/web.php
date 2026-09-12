<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/packages', function () {
    return view('packages');
})->name('packages');

Route::get('/explore-packages', function () {
    return view('explore-packages');
})->name('explore-packages');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/register-dmc', function () {
    return view('register-dmc');
})->name('register-dmc');

Route::get('/stay-detail', function () {
    return view('stay-detail');
})->name('stay-detail');

Route::get('/voyage-detail', function () {
    return view('voyage-detail');
})->name('voyage-detail');

Route::get('/api/airports', function (\Illuminate\Http\Request $request) {
    $q = trim($request->input('q', ''));
    if (strlen($q) < 1) {
        return response()->json([]);
    }

    $airports = \Illuminate\Support\Facades\DB::table('airports')
        ->where('iata_code', 'LIKE', "{$q}%")
        ->orWhere('city', 'LIKE', "{$q}%")
        ->orWhere('name', 'LIKE', "%{$q}%")
        ->orWhere('country', 'LIKE', "%{$q}%")
        ->select('iata_code', 'name', 'city', 'country')
        ->limit(25)
        ->get();

    return response()->json($airports);
});

Route::post('/airline-ticketing-inquiry', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Log::info('Airline Ticketing Inquiry Submitted:', $request->all());
    return response()->json([
        'status' => 'success',
        'message' => 'Thank you! Your airline ticketing inquiry has been submitted successfully. Our Canadian flight concierges will contact you shortly.'
    ]);
});

