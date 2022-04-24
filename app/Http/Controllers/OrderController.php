<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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
        session(['success' => 'Order have been created successfully']);

        return redirect('/');
    }
    // this my order will use join again because inside the table orders there is no information about the products so to show the product inside orders we need to join the database
    function myOrder()
    {
        $orders = Order::where('user_id',auth()->id())->with('product')->get();

        return view('order.myorder', compact('orders'));
    }
    function purchase()
    {
        $products_id = Product::where('user_id', auth()->id())->pluck('id');
        $orders = Order::whereIn('product_id', $products_id)->with(['product','user'])->get();

        return view('order.sellerorder', compact('orders'));
    }
    function payment(Order $order)
    {
        $order->update(['payment_status' => request()->status]);
        session(['success' => 'Payment Have Been Updated']);
        return redirect()->back();
    }
    function delivery(Order $order)
    {
        if(request()->status == 'Done'){
            $order->update(['status' => request()->status]);
            $order->product->user->profile->update([
                'balance' => $order->product->user->profile->balance + $order->product->price
            ]);
            session(['success' => 'Order Is Done Enjoy Your Product']);
            return redirect()->back();
        }
        $order->update(['status' => request()->status]);
        session(['success' => 'Delivery Status Have Been Updated']);
        return redirect()->back();
    }
    public function buyNow(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = auth()->id();
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
