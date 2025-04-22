<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginMainController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirect user to their intended destination or the dashboard if none is found
            return redirect()->intended(route('dashboard'));
        }
    
        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); // Redirect to login after logout
    }
}
