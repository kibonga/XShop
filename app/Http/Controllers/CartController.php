<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Cart::class);
    }

    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            try {
                $data = $request->get('data');
                $ids = array_keys($data);
                $products = Product::whereIn('id', $ids)->with('price')->get();
                $count = $products->count();
                if ($count < 1) {
                    dd("Error");
                }
                $userId = $request->user()->id;
                \DB::beginTransaction();
                $order = Order::create([
                    'user_id' => $userId
                ]);
                foreach ($products as $i => $product) {
                    OrderLine::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $data[$product->id],
                        'price' => $product->price->price
                    ]);
                }
                $email = $request->user()->email;

                Activity::create([
                    'name' => 'purchase',
                    'description' => "$email made purchase, order id: $order->id",
                    'user_id' => $userId
                ]);
                \DB::commit();
                return view('components.alert')->with([
                    'title' => "Order was successful",
                    'subtitle' => "We will contact you as soon as possible",
                    'type' => 'success'
                ]);
            } catch (\Exception $exception) {
                \DB::rollBack();
                $uniqueId = uniqid();
                \Log::error($uniqueId . " " . $exception->getMessage());
                return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
            }
        }
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            try {
                $data = $request->get('data');
                if (!empty($data)) {
                    $ids = array_keys($data);
                    $products = Product::whereIn('id', $ids)->with('price')->with('images')->get();
                    foreach ($products as $i => $product) {
                        $product['quantity'] = $data[$product->id];
                    }
                } else {
                    $products = [];
                }

                return view('cart.partials._products')->with([
                    'products' => $products
                ]);
            } catch (\Exception $exception) {
                $uniqueId = uniqid();
                \Log::error($uniqueId . " " . $exception->getMessage());
                return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
            }
        }
    }
}
