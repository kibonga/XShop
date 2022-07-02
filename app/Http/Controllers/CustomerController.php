<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public  function index() {
        $this->authorize('viewAny', User::class);
        return view('admin.customers.index')->with([
            'customers' => User::paginate(10)
        ]);
    }

    public function show($id) {
        $this->authorize('viewAny', User::class);
        return view('admin.customers.show')->with([
            'customer' => User::findOrFail($id),
            'orders' => Order::where('user_id', '=', $id)->withCount('orderLines')->paginate(10)
        ]);
    }
}
