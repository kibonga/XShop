<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $colors = Color::all();
        $models = ProductModel::all();

        $count = 1000;

        Product::factory()->count($count)->make()->each(function ($product) use ($colors, $models) {
//            dump($product->name);
//            dump(Product::all());
            $isAlready = Product::firstWhere('name', $product->name);
//            dump($isAlready);
            if (!$isAlready) {
                $product->save();


                $color = Color::find($product->color_id)->name;
                $model = strtolower(ProductModel::find($product->model_id)->name);
                $category = Category::find($product->category_id)->value;

                $modelArr = explode(' ', $model);
                $colorArr = explode(' ', $color);

                $tmpArr = array_merge($modelArr, $colorArr);

                $imagesArr = Config::get('maps.images');

                foreach ($imagesArr as $imagesType) {
                    $no = $imagesType['no'];
                    if (array_intersect($no, $tmpArr)) {
                        continue;
                    }
                    $yes = $imagesType['yes'];
                    if (!array_intersect($yes, $tmpArr)) {
                        continue;
                    }
                    $images = $imagesType['images'];
                    $tmpImages = array();
                    foreach ($images as $image) {
                        $tmpColor = $color;
                        if($imagesType['name'] === 'normal') {
                            $color = 'normal_' . $color;
                        }else {
                            $color = $tmpColor;
                        }
                        if (str_contains($image, $color) && str_contains($image, $category)) {
                            array_push($tmpImages, $image);
                        }
                        $color = $tmpColor;
                    }

                    if(!empty($tmpImages)) {
                        break;
                    }
                }

                $path = $tmpImages[array_rand($tmpImages)];

                // Set image for product
                $product->images()->save(
                    Image::make([
                        'path' => $path
                    ])
                );


                // Set price for product
                $product->prices()->save(
                    Price::make([
                        'price' => $this->getPrice()
                    ])
                );
            }
        });

    }

    private function getPrice() {
        $min = 15;
        $max = 100;
        return mt_rand ($min*10, $max*10) / 10;
    }
}
