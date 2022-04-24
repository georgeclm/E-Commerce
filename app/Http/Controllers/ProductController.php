<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('product.product', compact('products'));
    }
    function detail($id)
    {
        $product = Product::find($id);
        return view('product.detail', compact('product'));
    }
    function search(Request $req)
    {
        // for the search engine inside database search all the name like to following value
        $query = $req->input('query');
        $products = Product::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('category', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->get();
        return view('product.search', compact('products'));
    }
    public function create()
    {
        return view('product.addProduct');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
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
        $product = Product::create([
            "name" => $request->get('productname'),
            "price" => $request->get('price'),
            "category" => $request->get('category'),
            "description" => $request->get('description'),
            "gallery" => $request->file('gallery')->hashName(),
            "user_id" => auth()->id()
        ]);
        session(['success'=>'Product have been added successfully']);
        return redirect()->route('product.detail', $product->id);
    }
    public function update(Product $product, Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('gallery')) {
            File::delete('storage/product/' . $product->gallery);
            $request->validate([
                'gallery' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $request->file('gallery')->store('product', 'public');
            $product->update(['gallery' => $request->file('gallery')->hashName()]);
        }
        $product->update([
            "name" => $request->get('productname'),
            "price" => $request->get('price'),
            "category" => $request->get('category'),
            "description" => $request->get('description')
        ]);
        return redirect()->route('product.detail', $product->id);
    }
    public function order1(Request $request)
    {
        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'status' => 'Pending',
            'payment_method' => $request->payment,
            'payment_status' => 'Unpaid',
            'address' => $request->address
        ]);
        Cart::where('product_id', $request->product_id)->delete();

        $request->input();
        return redirect('/');
    }
}
