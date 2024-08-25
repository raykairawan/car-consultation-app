<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginForm(Request $request) {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->flash('success', 'Anda berhasil login.');
            return redirect('/admin/consultations')->with('success', 'Login berhasil');
        } else {
            Session::flash('error', 'Login gagal! Silakan coba lagi.');
            return back()->withErrors(['email' => 'Email atau Password salah'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Session::flash('success', 'Logout berhasil!');
        return redirect()->route('user.index');
    }
}
