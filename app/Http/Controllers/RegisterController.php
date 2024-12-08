<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function store(Request $request) {
        $request->merge([
            'username' => strtolower(str_replace(' ', '.', $request->input('username')))
        ]);

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8'
        ]);

        // encypt passsword
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration seccessfull! Please login');
        return redirect('/login')->with('success', 'Registration seccessfull! Please login');
    }
}
