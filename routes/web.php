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
