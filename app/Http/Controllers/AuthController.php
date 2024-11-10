<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
       // Display the registration view
// Show the login form
public function showLoginForm()
{
    return view('auth.login');
}

// Handle login request
public function login(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt login
    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

// Show the registration form
public function showRegistrationForm()
{
    return view('auth.register');
}

// Handle registration request
public function register(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ]);

    // Create user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Log the user in
    Auth::login($user);

    return redirect()->route('dashboard');
}

// Logout
public function logout()
{
    Auth::logout();
    return redirect('/');
}
}
