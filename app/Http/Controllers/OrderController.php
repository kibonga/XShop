<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        $orders = Order::with('user')->paginate(10);
        return view('admin.orders.index')->with([
            'orders' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        try {
            $this->authorize('view', $order);
            $order = Order::with('user')->with('orderLines')->findOrFail($order->id);
            return view('admin.orders.show')->with([
                'order' => $order,
                'lines' => OrderLine::with('product')->where('order_id', '=', $order->id)->paginate(5)
            ]);
        } catch (\Exception $exception) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

}
