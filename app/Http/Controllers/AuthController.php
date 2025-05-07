<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function loginAuthenticate(Request $request){
        if (Auth::attempt($request->only('username','password'))) {
            if (Auth::user()->username === 'admin') {
                return redirect()->route('admin');
            } else {
                return redirect()->route('/');
            }
        } else {
            return back();
        }
    }

    public function logout(){
        if (Auth::logout()) {
            return redirect()->route('login');
        } else {
            return back();
        }
    }
}
