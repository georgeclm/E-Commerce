<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

// this is to use the session inside controller
use Session;
// this is to use to join the databse inside the controller for the cart list
use Illuminate\Support\Facades\DB;




class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product',['products' => $data]);
    }
    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' =>$data]);
    }
    function search(Request $req)
    {
        // for the search engine inside database search all the name like to following value
        $data = Product::where('name', 'like', '%'.$req->input('query').'%')->get();
        return view('search',['products' =>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user')){
            // everytime the user hit addtocart then create new class cart 
            $cart = new Cart;
            // take the user id from the session 
            $cart->user_id=$req->session()->get('user')['id'];
            // from the name inside the input text to take the product id
            $cart->product_id=$req->product_id;
            // save to the database cart
            
            $cart->save();
            return redirect('/');
        }else
        {
            return redirect('/login');
        }
    }
    // so the real value can get putted inside the header cart item need to use static
    static function cartItem()
    {
        $userId= Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    // this cartlist is going to use the join function inside the databse 
    // not the usual relationship table
    // because for the cart table it only contain the user and product id and this is going to combine both
    function cartList()
    {
        // take the user id from the section for variable
        $userId= Session::get('user')['id'];
        // create the products database
        $products = DB::table('cart')
        // join take 3 parameter first for the product the second is the product id from cart and it have to be same with the products id
        // first param take the products database
        // second param tak the cart product id and have to be same with the products id 
        ->join('products','cart.product_id','=','products.id')
        // inside this new table find the cart user id where the id is the same with the user id var
        ->where('cart.user_id',$userId)
        // select the products all of it from the where that have been founf and the cart id 
        // take the cart id to make it can remove the products function
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=> $products]);
    }
    function removeCart($id)
    {
        // take the cart table and use the destroy function and take the id as param 
        Cart::destroy($id);
        // after that redirect to the cartlist
        return redirect('/cartlist');
    }
    // for the order now button to set the sum same with the cart list 
    function orderNow()
    {
        $userId= Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        // on here use sum to sum all and the variable is the product price total
        ->sum('products.price');
        return view('ordernow',['total'=> $total]);
        
    }
    // this function to save all the data user inputed and the product to the database
    function orderPlace(Request $req)
    {
        // take the user id from the session
        $userId= Session::get('user')['id'];
        // store all data inside the variable
        $allCart = Cart::where('user_id',$userId)->get();
        // loop through the list inside the cart and store each to the database
        foreach($allCart as $cart)
        {
            // create the new model order that is already in database create the class
            $order = new Order;
            // store all the requirment inside the database
            $order->product_id=$cart['product_id'];
            $order->user_id= $cart['user_id'];
            $order->status= 'Pending';
            $order->payment_method= $req->payment;
            $order->payment_status= 'Pending';
            $order->address= $req->address;
            // save all the value inside the database
            $order->save();
            // after the data have been saved then delete the data from the cart
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    // this my order will use join again because inside the table orders there is no information about the products so to show the product inside orders we need to join the database
    function myOrder()
    {
        $userId= Session::get('user')['id'];
        // first the orders table that is want to get join
        $orders= DB::table('orders')
        // join the database with the products and same as prior
        // how to read this join the first one is the products table and then the second is the orders product id and the last compare with the products.id inside products table
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myorder',['orders'=> $orders]);

    }
}
