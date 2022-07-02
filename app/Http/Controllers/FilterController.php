<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        return view('admin.filters.index')->with([
            'categories' => Category::withTrashed()->get(),
            'models' => ProductModel::withTrashed()->get(),
            'colors' => Color::withTrashed()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.filters.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'type' => 'required',
                'name' => 'required',
            ]);
            dd($validated);
            if(!$validated) {
                return redirect()->back()->withErrors("Invalid value");
            }
            $type = $request->get('type');
            $name = strtolower($request->get('name'));
            if ($type == 'color') {
                $model = Color::class;
            } else if ($type == 'category') {
                $model = Category::class;
            } else if ($type == 'model') {
                $model = ProductModel::class;
            }
            $is = $model::where('name', '=', $name)->first();
            if (!$is) {
                \DB::beginTransaction();
                $ordering = 1 + $model::orderBy('ordering', 'desc')->pluck('ordering')->first();
                if ($type == 'category') {
                    $tmp = explode(' ', $name);
                    $value = implode('-', $tmp);
                    $model::create([
                        'name' => $name,
                        'value' => $value,
                        'ordering' => $ordering
                    ]);
                } else {
                    $model::create([
                        'name' => $name,
                        'ordering' => $ordering
                    ]);
                }
                \DB::commit();
                return redirect()->route('admin.filters.index');
            }
        }
        catch (\Exception $exception) {
            \DB::rollBack();
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

    public function update(Request $request)
    {
        $type = $request->get('type');
        $ids = $request->get('ids');
        if ($type == 'categories') {
            $model = Category::class;
        } else if ($type == 'colors') {
            $model = Color::class;
        } else if ($type == 'models') {
            $model = ProductModel::class;
        }

        $model::whereNotIn('id', $ids)->delete();
        $model::whereIn('id', $ids)->restore();
        return redirect()->route('admin.filters.index');

    }

    public function destroy(Request $request) {
        dd($request);
    }
}
