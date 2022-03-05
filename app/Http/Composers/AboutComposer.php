<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class AboutCarouselComposer
{
    public function compose(View $view) {
       $carouselItems = Config::get('consts.pages.about.carousel');
       return $view->with([
           'carouselItems' => $carouselItems
       ]);
    }
}
