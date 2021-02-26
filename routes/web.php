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

Route::get("/toko/create", [tokoController::class, 'index']);
Route::post("/toko", [tokoController::class, 'createToko']);
Route::get('/tokoprofile/{id}', [tokoController::class, 'profile']);
Route::get('/profile/{id}', [UserController::class, 'profile']);
Route::post("/add_to_cart", [CartController::class, 'addToCart']);
Route::post("/buynow", [OrderController::class, 'buyNow']);

Route::get("cartlist", [CartController::class, 'cartList']);
Route::get("removecart/{id}", [CartController::class, 'removeCart']);
Route::get("ordernow", [OrderController::class, 'orderNow']);
Route::post("orderplace", [OrderController::class, 'orderPlace']);
Route::post("/order1", [ProductController::class, 'order1']);

Route::get("/myorders", [OrderController::class, 'myOrder']);
Route::get("/product/create", [ProductController::class, 'create']);
Route::post("/product", [ProductController::class, 'store']);

Route::get("/", [ProductController::class, 'index']);
Route::get("/detail/{id}", [ProductController::class, 'detail']);
Route::get("search", [ProductController::class, 'search']);
Route::resource('products', 'App\Http\Controllers\ProductController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
