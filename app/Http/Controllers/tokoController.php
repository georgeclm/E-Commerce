<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tokoProfile;
use Session;



class tokoController extends Controller
{
    function index(){
        return view('toko');

    }
    function createToko(Request $req){
        if($req->session()->has('user')){
            $toko = new tokoProfile;
            $toko->tokoname=$req['tokoname'];
            $toko->address=$req['address'];
            $toko->url=$req['url'];
            $toko->user_id=$req->session()->get('user')['id'];
            $toko->save();            
            return redirect('/');
        }
    }
    static function hasProfile()
    {
        $userId= Session::get('user')['id'];
        $data = tokoProfile::where('user_id',$userId)->count();
        if($data == 0)
        {
            return 'yes';
        }else{
            return 'no';
        }
    }

    function profile($id)
    {
        $tokoId = tokoProfile::where('user_id', $id)
            ->get('id');
        $data = tokoProfile::find($tokoId);
        return view('tokoProfile',['tokoprofile'=> $data]);
    }


}
