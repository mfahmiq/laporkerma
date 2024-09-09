<?php

namespace App\Http\Controllers;

use App\Models\BentukKegiatan;
use App\Models\Country;
use App\Models\Indikator;
use App\Models\JenisKerma;
use App\Models\Kerma;
use Illuminate\Http\Request;
use App\Models\KlasifikasiMitra;
use App\Models\KondisiTertentu;
use App\Models\PenggiatKerma;
use App\Models\Sasaran;
use App\Models\StatusKerma;
use App\Models\SumberPendanaan;

class KermaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kerma.kerma', [
            'dataKerma' => Kerma::all(),
            'jenis_kermas' => JenisKerma::all(),
            'sumber_pendanaans' => SumberPendanaan::all(),
            'status_kermas' => StatusKerma::all(),
            'kondisi_tertentus' => KondisiTertentu::all(),
            'penggiat_kermas' => PenggiatKerma::all(),
            'bentuk_kegiatans' => BentukKegiatan::all(),
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kerma.kermaCreate', [
            'jenis_kermas' => JenisKerma::all(),
            'sumber_pendanaans' => SumberPendanaan::all(),
            'status_kermas' => StatusKerma::all(),
            'bentuk_kegiatans' => BentukKegiatan::all(),
            'sasarans' => Sasaran::all(),
            'indikators' => Indikator::all(),
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kerma::create([
            'jenis_kerma_id' => $request->jenis_kerma_id,
            'sumber_pendanaan_id' => $request->sumber_pendanaan_id,
            'status_kerma_id' => $request->status_kerma_id,
            'kondisi_tertentu_id' => $request->kondisi_tertentu_id,
            'penggiat_kerma_id' => $request->penggiat_kerma_id,
            'bentuk_kegiatan_id' => $request->bentuk_kegiatan_id,
            'country_id' => $request->country_id,
            'klasifikasi_mitra_id' => $request->klasifikasi_mitra_id,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'nomor_dokumen' => $request->nomor_dokumen,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'anggaran' => $request->anggaran,
        ]);

        return redirect('kerma')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    public function getIndikatorsBySasaran($sasaranId)
    {
        $indikators = Indikator::where('sasaran_id', $sasaranId)->get();
        return response()->json($indikators);
    }
}
