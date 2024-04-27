<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    
  
        if (auth()->attempt($credentials)) {
            return redirect()->intended('/companies');
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
        
    }

    public function logout(){
        Auth::logout();
        return redirect('loginpage');
    }
}
