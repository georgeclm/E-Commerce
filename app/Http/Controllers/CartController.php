<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function addToCart(Request $req)
    {
        // everytime the user hit addtocart then create new class cart
        $cart = new Cart;
        // take the user id from the session
        $cart->user_id = auth()->id();
        // from the name inside the input text to take the product id
        $cart->product_id = $req->product_id;
        // save to the database cart
        $cart->save();
        session(['success' => 'Product Have Been Added To Cart']);
        return redirect()->back();
        // so the real value can get putted inside the header cart item need to use static
    }
    static function cartItem()
    {
        $userId = auth()->id();
        return Cart::where('user_id', $userId)->count();
    }
    // this cartlist is going to use the join function inside the databse
    // not the usual relationship table
    // because for the cart table it only contain the user and product id and this is going to combine both
    function cartList()
    {
        // take the user id from the section for variable
        $userId = auth()->id();
        // create the products database
        $products = DB::table('cart')
            // join take 3 parameter first for the product the second is the product id from cart and it have to be same with the products id
            // first param take the products database
            // second param tak the cart product id and have to be same with the products id
            ->join('products', 'cart.product_id', '=', 'products.id')
            // inside this new table find the cart user id where the id is the same with the user id var
            ->where('cart.user_id', $userId)
            // select the products all of it from the where that have been founf and the cart id
            // take the cart id to make it can remove the products function
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cart.cartlist', compact('products'));
    }
    function removeCart($id)
    {
        // take the cart table and use the destroy function and take the id as param
        Cart::destroy($id);
        // after that redirect to the cartlist
        session(['error' => 'Product Have Been Removed From Cart']);
        return redirect()->back();
    }
    static function hasCart()
    {
        $userId = auth()->id();
        $data = Cart::where('user_id', $userId)->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
}
