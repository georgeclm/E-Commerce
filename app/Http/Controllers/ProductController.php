<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;


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
}
