<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/index');
    }

    public function authenticate(Request $request)
    {
        // Validasi data sebelum diisi
        $credentials = $request->validate([
            'username'  => 'required',
            // 'email'     => 'required|email:dns',
            'password'  => 'required',
        ], [
            'username.required' => '*Username wajib diisi.',
            // 'email.required'    => '*Email wajib diisi.',
            // 'email.email'       => '*Email harus berupa alamat email yang valid.',
            'password.required' => '*Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Username / Password Anda salah!');
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
