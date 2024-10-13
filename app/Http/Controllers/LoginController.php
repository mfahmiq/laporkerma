<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
                'redirect' => '/dashboard' // Ganti dengan URL yang sesuai
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email dan password tidak cocok!'
        ], 422); // Menggunakan status 422 untuk kesalahan validasi
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return response()->json(["success" => true, "message" => "Logout berhasil!"]);
    }
}
