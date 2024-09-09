<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Country;
<<<<<<< HEAD
use App\Models\KlasifikasiMitra;
=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mitra.mitra', [
<<<<<<< HEAD
            'dataMitra' => Mitra::all(),
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all()
=======
            'dataMitra' => Mitra::all()
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('mitra.mitraCreate');
=======
        return view('mitra.mitraCreate', [
            'countries' => Country::all()
        ]);
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Mitra::create([
            'nama_institusi' => $request->nama_institusi,
            'alamat' => $request->alamat,
            'country_id' => $request->country_id,
<<<<<<< HEAD
            'klasifikasi_mitra_id' => $request->klasifikasi_mitra_id,
=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
            'telp' => $request->telp,
            'website' => $request->website,
        ]);

        return redirect('mitra')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $damit = Mitra::findorfail($id);
        return view('mitra.mitraEdit', compact('damit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
