<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class AboutComposer
{
    public function compose(View $view) {
       $carouselItems = Config::get('consts.pages.about.carousel');
       $serviceItems = Config::get('consts.pages.about.services');
       return $view->with([
           'carouselItems' => $carouselItems,
           'serviceItems' => $serviceItems
       ]);
    }
}
