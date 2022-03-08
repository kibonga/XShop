<?php

namespace App\Providers;

use App\Http\Composers\AboutComposer;
use App\Http\Composers\AllFiltersComposer;
use App\Http\Composers\ContactComposer;
use App\Http\Composers\NavComposer;
use App\Http\Composers\ProductsSelectOptionsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['shared.fixed.nav._nav'], NavComposer::class);
        View::composer('*', ContactComposer::class);
        View::composer(['products.index'], ProductsSelectOptionsComposer::class);
        View::composer(['home.about'], AboutComposer::class);
        View::composer(['products.partials.index._all-checkboxes'], AllFiltersComposer::class);
    }
}
