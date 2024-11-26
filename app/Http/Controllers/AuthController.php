<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Password;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }

    public function showLogin()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('rememberme');

        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
      
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showForgotPassword()
    {
        return view('forgot_password.index');
    }

    public function findEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return redirect()->route('reset-password')->with('email', $request->email);
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan.',
        ])->withInput();
    }

    public function showResetPasswordForm(Request $request)
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('forgot-password')->withErrors(['email' => 'Please search for your email first.']);
        }

        return view('reset_password.index', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found in our records.']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect('/login')->with('status', 'Password successfully updated. Please log in with your new password.');
    }

}
