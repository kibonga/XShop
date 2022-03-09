<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with([
            'product' => Product::withRelations()->findOrFail($product->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {

            $data = $request->get('data');
            $query = Product::query()->withRelations();

            if ($data['categories'] ?? null) $query->whereIn('category_id', $data['categories']);
            if ($data['models'] ?? null) $query->whereIn('model_id', $data['models']);
            if ($data['colors'] ?? null) $query->whereIn('color_id', $data['colors']);
            if ($data['search'] ?? null) $query->where('name', 'LIKE', '%' . $data['search'] . '%');

            if ($data['sort'] ?? null) {
                $sortType = $data['sort'];
                if ($sortType == 'price_desc') {
//                    dd("I go into PRICE DESC");
//                    $query->with(['prices' => function (Builder $q) {
//                        $q->orderBy('price', 'DESC');
//                    }]);
                } else if ($sortType == 'price_asc') {
//                dd("I go into PRICE ASC");
//                    $query->with(['prices' => function (Builder $q) {
//                        $q->orderBy('price', 'ASC');
//                    }]);
                } else if ($sortType == 'date_desc') {
                    $query->orderBy('created_at', 'DESC');
                } else if ($sortType == 'date_asc') {
                    $query->orderBy('created_at', 'ASC');
                }
            }

            $products = $query->paginate($data['perPage']);

            return view('products.partials.index._products')->with([
                'products' => $products
            ])->render();
        }
    }
}
