<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $this->authorize('viewAny', User::class);
        $mostActive = User::withCount(['orders' => function(Builder $query) {
            $query->whereBetween('created_at', [now()->subMonths(1), now()]);
        }])
            ->has('orders', '>=', 2)
            ->orderBy('orders_count', 'desc')
            ->take(5)
            ->get();
        $mostPopular = Product::withCount(['orders' => function(Builder $query) {
            $query->whereBetween('created_at', [now()->subMonths(1), now()]);
        }])->has('orders', '>=', 2)->orderBy('orders_count', 'desc')->take(5)->get();
        return view('admin.index')->with([
            'mostActive' => $mostActive,
            'mostPopular' => $mostPopular
        ]);
    }

}
