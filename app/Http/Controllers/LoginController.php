<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            "title" => "login",
            "active" => "login",
        ]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            "password" => ['required'],
            "email" => ['required', 'email:dns']
        ]);

        if(Auth()->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }else{
            return back()->with('loginError', 'Login failed');
        }
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
}
