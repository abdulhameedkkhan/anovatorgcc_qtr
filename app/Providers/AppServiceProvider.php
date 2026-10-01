<?php

namespace App\Providers;

use App\Support\Catalog;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {
            if (str_starts_with((string) $view->name(), 'admin.')) {
                return;
            }

            $view->with('navProducts', Catalog::products());
            $view->with('gccCountries', Catalog::countries());
            $view->with('newsletterCountries', Catalog::countries());
        });
    }
}
