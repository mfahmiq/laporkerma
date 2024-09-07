<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Country;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mitra.mitra', [
            'dataMitra' => Mitra::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mitra.mitraCreate', [
            'countries' => Country::all()
        ]);
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
