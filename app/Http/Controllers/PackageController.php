<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PackageController extends Controller
{
    /**
     * Display the Packages catalog page.
     */
    public function index(): View
    {
        return view('packages.index');
    }

    /**
     * Display the Explore Packages search & filter page.
     */
    public function explore(): View
    {
        return view('packages.explore');
    }

    /**
     * Display the Luxury Stay details page.
     */
    public function stayDetail(): View
    {
        return view('packages.stay-detail');
    }

    /**
     * Display the Voyage details page.
     */
    public function voyageDetail(): View
    {
        return view('packages.voyage-detail');
    }
}
