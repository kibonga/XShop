<?php

namespace App\Http\Composers;

use App\Models\Nav;
use Illuminate\View\View;

class NavComposer
{

    public function compose(View $view) {
        return $view->with([
            'navs' => Nav::orderBy('ordering')->get()
        ]);
    }
}
