<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('login')->with('success', 'Success Product Have Been Added');
    }
    public function login(Request $req)
    {
        // take the user data to compare with the user request and hashing purpose
        $user = User::where(['email' => $req->email])->first();
        // compare the user data with the post request from the form using the hashing checking with the user real password
        if (!$user || !Hash::check($req->password, $user->password)) {
            return redirect('/login')->withErrors('Couldnt find your account please log in again');
        } else {
            // if the data is correct then add the user session inside the user and then redirect to the home page
            $req->session()->put('user', $user);
            return redirect('/');
            // after this add the middleware to make sure after the user log in they wont access the login page again
        }
    }
    public function register(Request $req)
    {
        if ($req->password == $req->confirmpassword) {
            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect('/login');
        } else {
            return view('registerfail');
        }
    }
    public function profile($id)
    {
        $data = User::find($id);
        return view('profile', ['user' => $data]);
    }
    static function active()
    {
        $currentURL = url()->current();
        if ($currentURL == "http://127.0.0.1:8000") {
            return true;
        } else {
            return false;
        }
    }
    static function orderActive()
    {
        $currentURL = url()->current();
        if ($currentURL == "http://127.0.0.1:8000/myorders") {
            return true;
        } else {
            return false;
        }
    }
}
