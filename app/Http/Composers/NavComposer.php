<?php

namespace App\Http\Composers;

use App\Models\Nav;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class NavComposer
{

    public function compose(View $view) {

//        $navs = Nav::orderBy('ordering')->get()
//        dd(Config::get('consts.navs'));
        return $view->with([
            'navs' => Config::get('consts.navs')
        ]);
    }
}
