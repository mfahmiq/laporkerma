<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'mitras' => Mitra::all(),
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:255',
            'instansi_id' => 'required|exists:mitras,id',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat pengguna baru
        User::create($validatedData);

        // Mengembalikan respons JSON
        return response()->json(['redirect' => '/login'], 201);
    }
}
