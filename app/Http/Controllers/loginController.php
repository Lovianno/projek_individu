<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('layout.login');
    }
    public function authenticate(Request $request){
       $data =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/masterdashboard');
        }
 
        return back()->withErrors([
            'email' => 'Email atau Password Salah !!',
        ]);
    }
     public function logout(Request $request){
       Auth::logout(); 
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/login');
     }
}
