<?php

namespace App\Http\Controllers;

use App\Models\JenisKerma;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Dapatkan instansi ID dari user yang login
        $instansiId = Auth::user()->instansi_id;

        // Ambil semua jenis kerma, hitung jumlah kerma yang sesuai dengan instansi pengguna
        $jenis_kermas = JenisKerma::withCount(['kermas as kermas_count' => function ($query) use ($instansiId) {
            // Hanya hitung kerma yang sesuai dengan instansi_id user
            $query->whereHas('penggiat_kermas', function ($query) use ($instansiId) {
                $query->where('mitra_id', $instansiId);
            });
        }])->get();

        return view('dashboard.index', compact('jenis_kermas'));
    }
}
