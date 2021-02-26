<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\tokoProfile;
use Illuminate\Support\Facades\Auth;

class tokoController extends Controller
{
    function index()
    {
        return view('profile.toko');
    }
    function createToko(Request $req)
    {
        if ($req->session()->has('user')) {
            $toko = new tokoProfile;
            $toko->tokoname = $req['tokoname'];
            $toko->address = $req['address'];
            $toko->url = $req['url'];
            $toko->user_id = Auth::user()->id;
            $toko->save();
            return redirect('/');
        }
    }


    function profile($id)
    {
        $tokoId = tokoProfile::where('user_id', $id)
            ->get('id');
        $data = tokoProfile::find($tokoId);
        $toko = Product::where('user_id', $id)
            ->get();
        return view('profile.tokoProfile', ['tokoprofile' => $data, 'products' => $toko]);
    }
    static function hasProduct()
    {
        $userId = Auth::user()->id;
        $data = Product::where('user_id', $userId)->count();
        if ($data == 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
}
