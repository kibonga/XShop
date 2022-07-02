<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();

        $count = 2000;

        for($i=0; $i<=$count; $i++) {
            $quantity = rand(1, 10);
            $product = $products->random();
            $price = $product->price->price;
            $productId = $product->id;
            $orderId = $orders->random()->id;
            OrderLine::create([
                'order_id' => $orderId,
                'product_id' => $productId,
                'price' => $price,
                'quantity' => $quantity
            ]);
//            dd($products->random()->price->price);
        }

    }
}
