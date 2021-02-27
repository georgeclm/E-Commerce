<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // for the order now button to set the sum same with the cart list
    function orderNow()
    {
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', auth()->id())
            ->select('products.*', 'cart.id as cart_id')
            // on here use sum to sum all and the variable is the product price total
            ->sum('products.price');
        return view('order.ordernow', ['total' => $total]);
    }
    // this function to save all the data user inputed and the product to the database
    function orderPlace(Request $req)
    {
        // store all data inside the variable
        $allCart = Cart::where('user_id', auth()->id())->get();
        // loop through the list inside the cart and store each to the database
        foreach ($allCart as $cart) {
            // create the new model order that is already in database create the class
            $order = new Order;
            // store all the requirment inside the database
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'Pending';
            $order->payment_method = $req->payment;
            $order->payment_status = 'Pending';
            $order->address = $req->address;
            // save all the value inside the database
            $order->save();
            // after the data have been saved then delete the data from the cart
            Cart::where('user_id', auth()->id())->delete();
        }
        $req->input();
        return redirect('/');
    }
    // this my order will use join again because inside the table orders there is no information about the products so to show the product inside orders we need to join the database
    function myOrder()
    {
        $userId = auth()->id();
        // first the orders table that is want to get join
        $orders = DB::table('orders')
            // join the database with the products and same as prior
            // how to read this join the first one is the products table and then the second is the orders product id and the last compare with the products.id inside products table
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        return view('order.myorder', compact('orders'));
    }
    public function buyNow(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = $request->auth()->id();
        $cart->product_id = $request->product_id;
        $cart->save();
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.product_id', $request->product_id)
            ->select('products.*', 'cart.id as cart_id')
            // on here use sum to sum all and the variable is the product price total
            ->sum('products.price');
        $productId = $request->product_id;
        return view('order.order1', compact('total', 'productId'));
    }
    static function hasOrder()
    {
        $data = Order::where('user_id', auth()->id())->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
}
