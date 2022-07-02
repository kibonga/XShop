<?php

namespace App\Providers;

use App\Http\Composers\AboutComposer;
use App\Http\Composers\AllFiltersComposer;
use App\Http\Composers\ContactComposer;
use App\Http\Composers\NavComposer;
use App\Http\Composers\ProductsSelectOptionsComposer;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        View::composer(['shared.fixed.nav', 'shared.fixed.footer'], NavComposer::class);
        View::composer('*', ContactComposer::class);
        View::composer(['products.index'], ProductsSelectOptionsComposer::class);
        View::composer(['home.about'], AboutComposer::class);
        View::composer(['products.index', 'products.partials.shared._form'], AllFiltersComposer::class);
    }
}
