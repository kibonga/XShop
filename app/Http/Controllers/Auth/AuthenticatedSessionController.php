<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Activity;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

//        dd($request->user()->id);

        $id = $request->user()->id;
        $carts = Cart::where('user_id', '=', $id)->get();

        $data = [];
        foreach ($carts as $i => $row) {
            $data[$row->product_id] = $row->quantity;
        }
        foreach ($carts as $cart) {
            Cart::destroy($cart->id);
        }

        $email = $request->user()->email;
        Log::channel('login')->info("$email logged in", ['id' => $request->user()->id]);

        Activity::create([
            'name' => 'login',
            'description' => "$email logged in",
            'user_id' => $id
        ]);

        return view('home.home')->with([
            'localStorage' => $data
        ]);;
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $userId = $request->user()->id;
        $rows = json_decode($request->get('hidden'));
        if(!empty($rows)) {
            foreach ($rows as $productId => $quantity) {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
            }
        }


        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
