<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
    public function index(){
        return view('sign_up.index', [
            "title" => "sign up",
            "active" => "login",
        ]);
    }

    public function store(Request $request){
        
        $input = $request->validate([
            "name" => ['required', 'min:3', 'max:50'],
            "password" => ['required', 'min:5', 'max:50'],
            "email" => ['required', 'email', 'unique:users']
        ]);

        $input['slug'] = strtolower(preg_replace('/\s+/', '-', $input['name']));
        $input['password'] = bcrypt($input['password']);

       User::create($input);

       $request->session()->flash('success', 'account succesfully made! you may login');

       return redirect('/sign_up');
        
    }
}
