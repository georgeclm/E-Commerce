<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\tokoProfile;

class tokoController extends Controller
{
    function index()
    {
        return view('profile.toko');
    }
    function createToko(Request $req)
    {
        $toko = new tokoProfile;
        $toko->tokoname = $req['tokoname'];
        $toko->address = $req['address'];
        $toko->url = $req['url'];
        $toko->user_id = auth()->id();
        $toko->save();
        return redirect('/');
    }


    function profile($id)
    {
        $toko = tokoProfile::firstWhere('user_id', $id);
        $products = Product::where('user_id', $id)
            ->get();
        return view('profile.tokoProfile', compact('toko', 'products'));
    }

    function edit(tokoProfile $toko)
    {
        return view('profile.tokoEdit', compact('toko'));
    }

    function update(tokoProfile $toko)
    {
        request()->validate([
            'tokoname' => 'required',
            'address' => 'required',
            'url' => 'required',
        ]);
        $toko->update([
            'tokoname' => request()->tokoname,
            'address' => request()->address,
            'url' => request()->url,
        ]);
        session(['success' => 'Toko Profile have been updated']);
        return redirect()->route('tokoProfile.detail',$toko->id);
    }
    static function hasProduct()
    {
        $data = Product::where('user_id', auth()->id())->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
}
