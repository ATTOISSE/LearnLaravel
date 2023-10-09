<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function doLogin(AuthRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('produit.show'));
        }
       return to_route('auth.login')->withErrors([
            'email' => 'login et/ou mot de passe incorrect',
            'password' => 'login et/ou mot de passe incorrect',
       ])->onlyInput('email');      
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}