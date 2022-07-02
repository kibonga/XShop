<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth')->except(['index']);
        $this->authorizeResource(Product::class);
    }

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
//        $this->authorize('create', Product::class);
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {

            $validated = $request->validated();
            $product = Product::create($validated);

            $price = $validated['price'];
            if ($price) {
                $product->price()->save(
                    Price::make([
                        'price' => $price
                    ])
                );
            }


            $hasFile = $request->hasFile('image');
            if ($hasFile) {
                $path = $request->file('image')->store('products');
                $product->images()->save(
                    Image::make(['path' => $path])
                );
            }

            $product->save();
            $request->session()->flash('status', 'Product created successfully');
            return redirect()->route('products.show', ['product' => $product]);
        } catch (\Exception $exception) {
            $uniqueId = uniqid();
            \Log::error("$uniqueId" . $exception->getMessage());
            return response("We encountered an error.", 500);
        }
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
//        $this->authorize('update', $product);
        return view('products.edit')->with([
            'product' => $product
        ]);
        //return redirect()->route('admin.products.edit', ['product' => $product->id]);
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
        $this->authorize(Product::class);
        try {
            $product = Product::findOrFail($product->id);
            $validated = $request->validated();
            \DB::beginTransaction();
            $product->fill($validated);
            $price = $validated['price'];
            if ($price) {
                $product->price->price = $price;
                $product->price->save();
            }
            if ($request['remove_images']) {
                $deleteImagesIds = $validated['remove_images'];
                if ($deleteImagesIds && !empty($deleteImagesIds)) {
                    dump("I go into delete");
                    Image::whereIn('id', $deleteImagesIds)->delete();
                }
            }
            $hasFile = $request->hasFile('image');
            if ($hasFile) {
                $path = $request->file('image')->store('products');
                if ($product->image) {
                    Storage::delete($product->image->path);
                    $product->image->path = $path;
                    $product->image->save();
                } else {
                    $product->images()->save(
                        Image::make(['path' => $path])
                    );
                }
            }
            $product->save();
            \DB::commit();
            $request->session()->flash('status', 'Product updated successfully');
            return redirect()->route('products.show', ['product' => $product]);
        } catch (\Exception $exception) {
            \DB::rollBack();
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        try {
            $product = Product::findOrFail($product->id);
            \DB::beginTransaction();
            $product->delete();
            \DB::commit();
            session()->flash('status', 'Product deleted successfully');
            if ($request->ajax()) {
                return redirect()->route('products.index');
            }
            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            \DB::rollBack();
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            try {
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

                $products = $query->paginate($data['perPage'])->withQueryString();

                return view('products.partials.index._products')->with([
                    'products' => $products
                ])->render();
            }
            catch (\Exception $exception) {
                $uniqueId = uniqid();
                \Log::error($uniqueId . " " . $exception->getMessage());
                return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
            }
        }
    }
}
