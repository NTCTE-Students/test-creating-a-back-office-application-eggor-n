<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionsController extends Controller
{
    public function login(Request $request) {
        $request -> validate([
            'user.email' => 'required|email',
            'user.password' => 'required|min:8|alpha_dash',
        ]);
        if(Auth::attempt($request -> input('user'))){
            return redirect('/');
        } else{
            return back() -> withErrors([
                'user.email' => 'Представленные почта или пароль не подходят'
            ]);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
