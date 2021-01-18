<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\tokoController;


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

Route::get('/login', function () {
    return view('login');
});
// for the logout route use the get and the function 
Route::get('/logout', function () {
    // forget the session from the browser
    Session::forget('user');
    // redirect to the login page
    return redirect('login');
});
Route::get('/profile/{id}', [UserController::class, 'profile']);

Route::view('/register','register');
Route::post("/login", [UserController::class, 'login']);
Route::get("/toko/{id}", [tokoController::class, 'index']);


Route::post("/register", [UserController::class, 'register']);
Route::get("/", [ProductController::class, 'index']);
Route::get("/detail/{id}", [ProductController::class, 'detail']);
Route::get("search", [ProductController::class, 'search']);
Route::post("add_to_cart", [ProductController::class, 'addToCart']);
Route::get("cartlist", [ProductController::class, 'cartList']);
Route::get("removecart/{id}", [ProductController::class, 'removeCart']);
Route::get("ordernow", [ProductController::class, 'orderNow']);
Route::post("orderplace", [ProductController::class, 'orderPlace']);
Route::get("myorders", [ProductController::class, 'myOrder']);










