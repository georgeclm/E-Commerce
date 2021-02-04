<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\tokoProfile;



class tokoController extends Controller
{
    function index()
    {
        return view('toko');
    }
    function createToko(Request $req)
    {
        if ($req->session()->has('user')) {
            $toko = new tokoProfile;
            $toko->tokoname = $req['tokoname'];
            $toko->address = $req['address'];
            $toko->url = $req['url'];
            $toko->user_id = $req->session()->get('user')['id'];
            $toko->save();
            return redirect('/');
        }
    }
    static function hasProfile()
    {
        $userId = session()->get('user')['id'];
        $data = tokoProfile::where('user_id', $userId)->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }

    function profile($id)
    {
        $tokoId = tokoProfile::where('user_id', $id)
            ->get('id');
        $data = tokoProfile::find($tokoId);
        $toko = Product::where('user_id', $id)
            ->get();
        return view('tokoProfile', ['tokoprofile' => $data, 'products' => $toko]);
    }
    static function hasProduct()
    {
        $userId = session()->get('user')['id'];
        $data = Product::where('user_id', $userId)->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
}
