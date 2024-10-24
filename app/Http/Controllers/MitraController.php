<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Country;
use App\Models\KlasifikasiMitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data berdasarkan filter yang diterapkan
        $query = Mitra::query();

        // Filter berdasarkan klasifikasi mitra
        if ($request->filled('klasifikasi_mitra_id')) {
            $query->where('klasifikasi_mitra_id', $request->klasifikasi_mitra_id);
        }

        // Filter berdasarkan negara
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        // Mengurutkan data berdasarkan created_at secara menurun
        $dataMitra = $query->orderBy('created_at', 'desc')->get();

        // Periksa setiap mitra apakah dia digunakan di Penggiat Kermas
        foreach ($dataMitra as $mitra) {
            // Periksa apakah mitra berelasi dengan Penggiat Kermas
            $isUsed = $mitra->penggiat_kermas()->exists(); // Mengecek relasi
            $mitra->status = $isUsed ? 'Digunakan' : 'Tidak Digunakan'; // Set status
        }

        // Mengirimkan data ke view
        return view('mitra.mitra', [
            'dataMitra' => $dataMitra,
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form create
        return view('mitra.mitraCreate', [
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'country_id' => 'nullable|integer',
            'klasifikasi_mitra_id' => 'nullable|integer',
            'telp' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:255',
        ], [
            'nama_institusi.required' => 'Nama unit tidak boleh kosong',
        ]);

        // Menyimpan data ke database
        $mitra = Mitra::create($validatedData);

        return response()->json([
            'message' => 'Data unit berhasil disimpan!',
            'id' => $mitra->id,
            'nama_institusi' => $mitra->nama_institusi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mendapatkan data mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);
        return response()->json(['mitra' => $mitra]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'country_id' => 'nullable|integer',
            'klasifikasi_mitra_id' => 'nullable|integer',
            'telp' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:255',
        ], [
            'nama_institusi.required' => 'Nama unit tidak boleh kosong',
        ]);

        // Mengambil data mitra yang akan diupdate berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        // Mengupdate data di database
        $mitra->update($validatedData);

        // Redirect ke halaman mitra dengan pesan sukses
        return response()->json(['message' => 'Unit berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mendapatkan data mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        // Menghapus data dari database
        $mitra->delete();

        // Mengirim respon JSON sukses untuk permintaan Ajax
        return response()->json(['success' => true]);
    }
}
