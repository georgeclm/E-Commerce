<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class tokoController extends Controller
{
    function index($id){
        $data = User::find($id);
        return view('toko',['user'=> $data]);

    }
}
