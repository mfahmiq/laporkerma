<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::with('mitra')->get(); // Ambil semua pengguna dengan relasi mitra
        return view('user.index', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        $mitras = Mitra::all(); // Ambil semua mitra untuk dropdown
        return view('user.create', compact('mitras'));
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'instansi_id' => 'required|exists:mitras,id', // Pastikan instansi_id ada di tabel mitras
            'role' => 'required|in:admin,user', // Validasi role yang diizinkan (admin atau user)
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        // Simpan pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'instansi_id' => $request->instansi_id,
            'role' => $request->role, // Simpan role yang dipilih (admin atau user)
        ]);

        return response()->json(['redirect' => route('user.index')]);
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit(User $user)
    {
        $mitras = Mitra::all(); // Ambil semua mitra untuk dropdown
        return view('user.edit', compact('user', 'mitras'));
    }

    // Memperbarui informasi pengguna
    public function update(Request $request, User $user)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'instansi_id' => 'required|exists:mitras,id',
            'role' => 'required|in:admin,user', // Pastikan role yang diisi valid
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        // Perbarui informasi pengguna
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, maka diperbarui
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->instansi_id = $request->instansi_id;
        $user->role = $request->role; // Update role
        $user->save();

        return response()->json(['redirect' => route('user.index')]);
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $user->delete(); // Hapus pengguna
        return response()->json(['success' => 'User deleted successfully']); // Mengembalikan JSON untuk respons
    }
}
