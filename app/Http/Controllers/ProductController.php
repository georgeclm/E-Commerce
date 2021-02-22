<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Intervention\Image\Facades\Image;


// this is to use to join the databse inside the controller for the cart list
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }
    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        // for the search engine inside database search all the name like to following value
        $data = Product::where('name', 'LIKE', '%' . $req->input('query') . '%')
            ->orWhere('category', 'LIKE', '%' . $req->input('query') . '%')
            ->orWhere('description', 'LIKE', '%' . $req->input('query') . '%')
            ->get();
        return view('search', ['products' => $data]);
    }
    public function create()
    {
        return view('addProduct');
    }
    public function store(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('gallery')) {
            $request->validate([
                'gallery' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
        }
        $request->file('gallery')->store('product', 'public');
        $userId = session()->get('user')['id'];
        $product = new Product([
            "name" => $request->get('productname'),
            "price" => $request->get('price'),
            "category" => $request->get('category'),
            "description" => $request->get('description'),
            "gallery" => $request->file('gallery')->hashName(),
            "user_id" => $userId
        ]);
        $product->save(); // Finally, save the record.
        return redirect('/');
    }
    public function order1(Request $request)
    {
        $userId = session()->get('user')['id'];
        $order = new Order;
        $order->product_id = $request->product_id;
        $order->user_id = $userId;
        $order->status = 'Pending';
        $order->payment_method = $request->payment;
        $order->payment_status = 'Pending';
        $order->address = $request->address;
        $order->save();
        Cart::where('product_id', $request->product_id)->delete();

        $request->input();
        return redirect('/');
    }
}
