<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\tokoController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get("/", [ProductController::class, 'index']);
Route::get("/search", [ProductController::class, 'search']);
Route::get("/detail/{id}", [ProductController::class, 'detail'])->name('product.detail');

Route::group(['middleware' => 'auth'], function () {
    Route::patch("/product/edit/{product}", [ProductController::class, 'update'])->name('product.update');
    Route::get("/toko/create", [tokoController::class, 'index']);
    Route::post("/toko", [tokoController::class, 'createToko']);
    Route::get('/tokoprofile/{id}', [tokoController::class, 'profile'])->name('tokoProfile.detail');;
    Route::get('/tokoprofile/{toko}/edit', [tokoController::class, 'edit'])->name('tokoProfile.edit');
    Route::put('/tokoprofile/{toko}/edit', [tokoController::class, 'update'])->name('tokoProfile.update');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('users.detail');;
    Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/profile/{user}/edit', [UserController::class, 'update'])->name('users.update');
    Route::post("/add_to_cart", [CartController::class, 'addToCart']);
    Route::post("/buynow", [OrderController::class, 'buyNow']);

    Route::get("/cartlist", [CartController::class, 'cartList']);
    Route::get("/removecart/{id}", [CartController::class, 'removeCart']);
    Route::get("/ordernow", [OrderController::class, 'orderNow']);
    Route::post("/orderplace", [OrderController::class, 'orderPlace']);
    Route::post("/order1", [ProductController::class, 'order1']);

    Route::get("/myorders", [OrderController::class, 'myOrder']);
    Route::get("/purchase", [OrderController::class, 'purchase'])->name('purchases');
    Route::get("/{order}/payment/{status}", [OrderController::class, 'payment'])->name('purchases.payment.update');
    Route::get("/{order}/delivery/{status}", [OrderController::class, 'delivery'])->name('purchases.delivery.update');
    Route::get("/product/create", [ProductController::class, 'create']);
    Route::get("/product/{product}/edit", [ProductController::class, 'edit'])->name('product.edit');
    Route::post("/product", [ProductController::class, 'store'])->name('products.store');
});
