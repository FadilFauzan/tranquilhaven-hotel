<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index', [
            'title' => 'Auth',
            'active' => 'auth',
        ]);
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
        
            // Periksa peran pengguna
            if (Auth::user()->is_admin === 1) {
                return redirect()->intended('/dashboard')->with('login', 'You have successfully logged in');
            } else {
                return redirect('/')->with('login', 'You have successfully logged in');
            }
        }

        return back()->with('loginError', 'We couldn’t log you in. Please ensure your email and password are correct.');

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
