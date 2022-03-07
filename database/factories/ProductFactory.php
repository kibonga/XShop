<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $colors = Config::get('maps.colors');
        $models = Config::get('maps.models');
        $categories = Config::get('consts.categories');

        $images = Config::get('maps.images');

        for($i=0; $i<10000; $i++) {

            $model = $models[array_rand($models)];
            $modelLower = strtolower($model);

            $imageObj = $images[array_rand($images)];


            $isNo = false;
            $isYes = false;

            foreach($imageObj['no'] as $no) {
                if(str_contains($modelLower, $no)) $isNo = true;
            }

            if($isNo) {
                continue;
            }

            foreach($imageObj['yes'] as $yes) {
                if(str_contains($modelLower, $yes)) $isYes = true;
            }

            if(!$isYes) {
                continue;
            }

            $imagesArr = $imageObj['images'];
            $imageString = $imagesArr[array_rand($imagesArr)];

            $categoryString = explode('_', $imageString)[0];
//            dump('This is category');
//            dump($categoryString);


            $colorName = null;
            foreach($colors as $color) {
                if(str_contains($imageString, $color)) $colorName = $color;
            }

            $modelId = ProductModel::where('name', $model)->pluck('id')->first();
            $colorId = Color::where('name', $colorName)->pluck('id')->first();
            $category = Category::where('value', $categoryString)->first();
            $categoryName = $category->name;
            $categoryId = $category->id;
//            dump("This is category object");
//            dump($category->name);
//            dump($category->value);
//            dump($category->id);
//            die();

            $name = $categoryName . " " . $model . " - " . $colorName;

            return [
                'name' => $name,
                'description' => $this->faker->text(75),
                'model_id' => $modelId,
                'color_id' => $colorId,
                'category_id' => $categoryId
            ];
        }


    }
}
