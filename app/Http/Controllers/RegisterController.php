<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\KlasifikasiMitra;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'mitras' => Mitra::all(),
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all(),
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:255',
        'instansi_id' => 'required|exists:mitras,id',
    ]);

    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan login');
}

}
