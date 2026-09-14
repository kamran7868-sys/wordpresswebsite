<?php

namespace App\Providers;

use App\Models\Package;
use App\Observers\PackageObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('admin.pagination');
        Paginator::defaultSimpleView('admin.pagination');

        Package::observe(PackageObserver::class);

        if (!app()->environment('testing') && (str_starts_with((string) config('app.url'), 'https://') || app()->environment('production'))) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
