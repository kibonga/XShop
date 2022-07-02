<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index() {
        $this->authorize('admin', Product::class);
        return view('admin.products.index')->with([
            'products' => Product::withRelations()->withTrashed()->paginate(10)
        ]);
    }

    public function restore($id) {
        try {
            $this->authorize('admin', Product::class);
            $product = Product::withTrashed()->findOrFail($id);
            $product->restore();
            return view('admin.products.index')->with([
                'products' => Product::withTrashed()->paginate(10)
            ]);
        }
        catch (\Exception $exception) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }

    }

    public function  show($id) {
        $this->authorize('admin', Product::class);
        $product = Product::withRelations()->withTrashed()->withSum('orders', 'quantity')->withCount(['orders' => function($q) use($id) {
            $q->where('product_id', '=', $id);
        }])->findOrFail($id);
        return view('admin.products.show')->with([
            'product' => $product
        ]);
    }
}
