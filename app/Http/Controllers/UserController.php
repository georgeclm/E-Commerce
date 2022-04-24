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

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user->update([
            'name' => request()->name,
            'email' => request()->email,
        ]);
        session(['success' => 'Profile have been updated']);
        return redirect()->route('users.detail',$user->id);
    }
}
