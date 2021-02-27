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
        $tokoId = tokoProfile::where('user_id', $id)
            ->get('id');
        $tokoprofile = tokoProfile::find($tokoId);
        $products = Product::where('user_id', $id)
            ->get();
        return view('profile.tokoProfile', compact('tokoprofile', 'products'));
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
