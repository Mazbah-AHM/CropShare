<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->city = $request->city;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->phone = $request->phone;

        $user->save();

        return back()->with('success', 'Register Succesful!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Login Success');
        };
        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function resetPassword()
    {
        return view('reset_password');
    }

    public function resetPasswordPost(Request $request)
    {
        return back()->with('success', 'An email has been sent to your mailbox!');
    }
}
