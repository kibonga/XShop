<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class ContactComposer
{

    public  function  compose(View $view) {
        $contactInfo = Config::get('consts.contact-info');
        $socialInfo = Config::get('consts.social-info');
        return $view->with([
            'contactInfo' => $contactInfo,
            'socialInfo' => $socialInfo,
        ]);
    }

}
