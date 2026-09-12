<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Display the Home page.
     */
    public function home(): View
    {
        return view('pages.home');
    }

    /**
     * Display the About Us page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the Contact page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Display the Register as DMC page.
     */
    public function registerDmc(): View
    {
        return view('pages.register-dmc');
    }
}
