<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home.home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact', [HomeController::class, 'contactAdmin'])->name('home.contact.admin');
Route::get('/author', [HomeController::class, 'author'])->name('home.author');

Route::resource('/products', ProductController::class);
Route::post('/products/fetch', [ProductController::class, 'fetch'])->name('products.fetch');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/fetch', [CartController::class, 'fetch'])->name('cart.fetch');

//Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
//Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::get('admin/products', [DashboardProductController::class, 'index'])->name('admin.products.index');
Route::get('admin/products/{product}/restore', [DashboardProductController::class, 'restore'])->name('admin.products.restore');
Route::get('admin/products/{product}/stats', [DashboardProductController::class, 'show'])->name('admin.products.stats');
//Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::get('admin/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
Route::get('admin/customers/{customer}', [CustomerController::class, 'show'])->name('admin.customers.show');
Route::get('admin/filters', [FilterController::class, 'index'])->name('admin.filters.index');
Route::get('admin/filters/create', [FilterController::class, 'create'])->name('admin.filters.create');
Route::post('admin/filters/store', [FilterController::class, 'store'])->name('admin.filters.store');
Route::put('admin/filters/update', [FilterController::class, 'update'])->name('admin.filters.update');
Route::delete('admin/filters/{id}', [FilterController::class, 'destroy'])->name('admin.filters.destroy');
Route::get('admin/activities', [ActivityController::class, 'index'])->name('admin.activities.index');
Route::post('admin/activities', [ActivityController::class, 'index'])->name('admin.activities.index');
Route::get('admin', [DashboardController::class, 'index'])->name('admin.index');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
