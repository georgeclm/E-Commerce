<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        return view('profile.profile', compact('user'));
    }
}
