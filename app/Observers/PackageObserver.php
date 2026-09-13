<?php

namespace App\Observers;

use App\Models\Package;
use Illuminate\Support\Facades\Artisan;

class PackageObserver
{
    /**
     * Handle the Package "saved" event (covers created and updated).
     */
    public function saved(Package $package): void
    {
        Artisan::call('sitemap:generate');
    }

    /**
     * Handle the Package "deleted" event.
     */
    public function deleted(Package $package): void
    {
        Artisan::call('sitemap:generate');
    }

    /**
     * Handle the Package "restored" event.
     */
    public function restored(Package $package): void
    {
        Artisan::call('sitemap:generate');
    }

    /**
     * Handle the Package "force deleted" event.
     */
    public function forceDeleted(Package $package): void
    {
        Artisan::call('sitemap:generate');
    }
}

