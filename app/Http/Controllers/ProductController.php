<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
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
}
