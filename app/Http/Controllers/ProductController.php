<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;




class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product.product', ['products' => $data]);
    }
    function detail($id)
    {
        $data = Product::find($id);
        return view('product.detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        // for the search engine inside database search all the name like to following value
        $query = $req->input('query');
        $data = Product::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('category', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->get();
        return view('product.search', ['products' => $data]);
    }
    public function create()
    {
        return view('product.addProduct');
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
        $product = new Product([
            "name" => $request->get('productname'),
            "price" => $request->get('price'),
            "category" => $request->get('category'),
            "description" => $request->get('description'),
            "gallery" => $request->file('gallery')->hashName(),
            "user_id" => auth()->id()
        ]);
        $product->save(); // Finally, save the record.
        return redirect('/');
    }
    public function order1(Request $request)
    {
        $userId = auth()->id();
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
