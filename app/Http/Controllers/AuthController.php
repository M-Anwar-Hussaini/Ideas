<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        return redirect(route('home'))->with('success', 'User created successfully.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect(route('home'))->with('success', 'Logged in successfully.');
        }
        return redirect(route('login'))->withErrors([
            'password' => 'Invalid credentials provided'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect(route('home'))->with('success', 'User logged out successfully');
    }
}
