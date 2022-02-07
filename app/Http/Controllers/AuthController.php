<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth()
    {
        return view("auth");
    }

    public function Authenticate(Request $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->route("home");
        }

        return back()->withErrors([
            "email" => "Do not match our records"
        ]);
    }

    public function Registrate(){
        return view('reg');
    }

    public function reg_check(Request $request){

        $request->validate([
            "name" =>'required|min:6|max:20',
            "email" => 'required|min:4|max:100',
            "password" => 'required|min:6|max:15|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password', $request->input("remember")]));
        auth()->login($user);

        return redirect()->route('home');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("home");
    }
}
