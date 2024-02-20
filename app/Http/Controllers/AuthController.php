<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.loginUser', [
            "title" => "Login Page",
            "users" => User::all()
        ]);
    }

    public function auth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($validatedData)) {
            return back()->with('error', 'Invalid credentials');
        }

        return redirect('/about');
    }

    public function register()
    {
        return view('register.registerUser', [
            "title" => "Register Page",
            "users" => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $validator['password'] = Hash::make($validator['password']);
        User::create($validator);
        
        return redirect('/auth/login')->with('success', 'Registration successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/auth/login');
    }
}
