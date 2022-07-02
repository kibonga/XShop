<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactAdminRequest;
use App\Mail\ContactAdmin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home()
    {
        try {
            $blacks = Product::with('images')->with('color')->where('color_id', 3)->take(3)->get();
            $latests = Product::with('images')->with('model')->orderByDesc('created_at')->take(3)->get();
            return view('home.home')->with([
                'blacks' => $blacks,
                'latests' => $latests
            ]);
        } catch (\Exception $exception) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function about()
    {
        return view('home.about');
    }

    public function author()
    {
        return view('home.author');
    }

    public function contactAdmin(ContactAdminRequest $request)
    {
        try {
            $validated = $request->validated();
            Mail::to('email@email.com')->send(new ContactAdmin($validated));
            $request->session()->flash('status', 'Message sent successfully');
            return view('home.contact');
        } catch (\Exception $exception) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }
}
