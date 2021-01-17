<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UserController extends Controller
{
    function login(Request $req){
        // take the user data to compare with the user request and hashing purpose
        $user = User::where(['email'=>$req->email])->first();
        // compare the user data with the post request from the form using the hashing checking with the user real password
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or password is not matched";
        }else{
            // if the data is correct then add the user session inside the user and then redirect to the home page  
            $req->session()->put('user', $user);
            return redirect('/');
            // after this add the middleware to make sure after the user log in they wont access the login page again
        }
    }
}
