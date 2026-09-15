<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display the Packages catalog page with categorized packages from MySQL.
     */
    public function index(Request $request): View
    {
        $region = $request->query('region');

        $holidayQuery = Package::published()->category('holiday')->latest();
        if ($region && $region !== 'all') {
            $holidayQuery->where('region', $region);
        }
        $holidayPackages = $holidayQuery->get();

        $cruisePackages = Package::published()->category('cruise')->latest()->get();
        $hotelPackages = Package::published()->category('hotel')->latest()->get();

        return view('packages.index', compact('holidayPackages', 'cruisePackages', 'hotelPackages', 'region'));
    }

    /**
     * Display the Explore Packages search & filter page or package details.
     */
    public function explore(?string $slug = null): View
    {
        $package = null;
        if ($slug) {
            $package = Package::published()->where('slug', $slug)->first();
        }

        if (!$package) {
            $package = Package::published()->where('slug', 'rocky-mountaineer-luxury-express')->first()
                ?? Package::published()->category('holiday')->latest()->first()
                ?? Package::published()->latest()->first();
        }

        $relatedPackages = Package::published()
            ->where('id', '!=', $package ? $package->id : 0)
            ->latest()
            ->take(3)
            ->get();

        return view('packages.explore', compact('package', 'relatedPackages'));
    }

    /**
     * Display the Luxury Stay details page.
     */
    public function stayDetail(?string $slug = null): View
    {
        $package = null;
        if ($slug) {
            $package = Package::published()->where('slug', $slug)->first();
        }

        if (!$package) {
            $package = Package::published()->where('slug', 'fairmont-banff-springs-castle')->first()
                ?? Package::published()->where('category', 'hotel')->latest()->first()
                ?? Package::published()->latest()->first();
        }

        $relatedStays = Package::published()->category('hotel')
            ->where('id', '!=', $package ? $package->id : 0)
            ->latest()
            ->take(3)
            ->get();

        return view('packages.stay-detail', compact('package', 'relatedStays'));
    }

    /**
     * Display the Voyage details page.
     */
    public function voyageDetail(?string $slug = null): View
    {
        $package = null;
        if ($slug) {
            $package = Package::published()->where('slug', $slug)->first();
        }

        if (!$package) {
            $package = Package::published()->where('slug', 'inside-passage-glacier-voyage')->first()
                ?? Package::published()->where('category', 'cruise')->latest()->first()
                ?? Package::published()->latest()->first();
        }

        $relatedVoyages = Package::published()->category('cruise')
            ->where('id', '!=', $package ? $package->id : 0)
            ->latest()
            ->take(3)
            ->get();

        return view('packages.voyage-detail', compact('package', 'relatedVoyages'));
    }

    /**
     * Display individual package by slug.
     */
    public function show(string $slug): View
    {
        $package = Package::published()->where('slug', $slug)->firstOrFail();

        if ($package->category === 'cruise') {
            return $this->voyageDetail($slug);
        }

        if ($package->category === 'hotel') {
            return $this->stayDetail($slug);
        }

        return $this->explore($slug);
    }
}
