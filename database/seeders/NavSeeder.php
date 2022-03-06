<?php

namespace Database\Seeders;

use App\Models\Nav;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;


class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $navs = Config::get('consts.navs');
        foreach ($navs as $nav) {
            Nav::create($nav);
        }
    }
}
