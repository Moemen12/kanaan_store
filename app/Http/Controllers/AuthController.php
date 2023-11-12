<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request){
         return view("admin.login");
    }

        public function store(Request $request)
        {
            // Validate the user's input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            // Attempt to authenticate the user
            $credentials = $request->only('email', 'password');
        
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended(route('dashboard')); // Redirect to the intended URL or a default one
            }
        
            // Authentication failed...
            return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        }

        public function logout(){
            Auth::logout();
        
            return redirect()->route('login');
        }
    
}
