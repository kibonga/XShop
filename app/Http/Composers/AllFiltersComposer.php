<?php

namespace App\Http\Composers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AllFiltersComposer
{
    public function compose(View $view) {
        $categories = Category::all();
        $models = ProductModel::all();
        $colors = Color::all();

//        $categories = Cache::tags(['categories'])->remember('categories', 3600, function () {
//            return Category::all();
//        });

//        dd(Product::with('category')->get()[0]->category->name);

        return $view->with([
            'categories' => $categories,
            'models' => $models,
            'colors' => $colors
        ]);
    }
}
