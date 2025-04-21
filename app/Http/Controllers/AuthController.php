<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegister() {
        return view('auth.register');
    }
 
    // Register a new user
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
 
        // Create the new user and hash the password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
 
        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registered successfully. Please login.');
    }
 
    // Show the login form
    public function showLogin() {
        return view('auth.login');
    }
 
    // Handle login attempt
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();
            
            // Redirect to the posts.create route after successful login
            return redirect()->route('posts.create'); 
        }
 
        // If authentication fails, redirect back with error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
 
    // Handle logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect()->route('login');
    }
}
