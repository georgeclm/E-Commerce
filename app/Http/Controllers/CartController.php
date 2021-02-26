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
        if (Auth::user()) {
            // everytime the user hit addtocart then create new class cart
            $cart = new Cart;
            // take the user id from the session
            $cart->user_id = Auth::user()->id;
            // from the name inside the input text to take the product id
            $cart->product_id = $req->product_id;
            // save to the database cart
            $cart->save();

            return redirect('/');
        } else {
            return redirect('/login');
        }
        // so the real value can get putted inside the header cart item need to use static
    }
    static function cartItem()
    {
        $userId = Auth::user()->id;
        return Cart::where('user_id', $userId)->count();
    }
    // this cartlist is going to use the join function inside the databse
    // not the usual relationship table
    // because for the cart table it only contain the user and product id and this is going to combine both
    function cartList()
    {
        // take the user id from the section for variable
        $userId = Auth::user()->id;
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
        return view('cart.cartlist', ['products' => $products]);
    }
    function removeCart($id)
    {
        // take the cart table and use the destroy function and take the id as param
        Cart::destroy($id);
        // after that redirect to the cartlist
        return redirect('/cartlist');
    }
    static function hasCart()
    {
        $userId = Auth::user()->id;
        $data = Cart::where('user_id', $userId)->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
}
