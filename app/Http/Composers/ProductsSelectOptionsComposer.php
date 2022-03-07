<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class ProductsSelectOptionsComposer
{
    public function compose(View $view) {
        return $view->with([
            'options' => Config::get('consts.products-select')
        ]);
    }
}
