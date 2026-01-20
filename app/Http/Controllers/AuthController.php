<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user'
        ]);
        return redirect('/login')->with('success', 'Registration successful');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
         ]);
        if (!auth()->attempt($request->only('email', 'password')))
            return back()->withErrors(['email' => 'Invalid credentials']);

        return redirect('/books');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
