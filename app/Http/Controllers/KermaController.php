<?php

namespace App\Http\Controllers;

use App\Models\Kerma;
use App\Models\Mitra;
use App\Models\Country;
use App\Models\JenisKerma;
use App\Models\StatusKerma;
use App\Models\PenggiatKerma;
use App\Models\DetailKegiatan;
use Illuminate\Http\Request;
use App\Models\BentukKegiatan;
use App\Models\Indikator;
use App\Models\SumberPendanaan;
use App\Models\KlasifikasiMitra;
use App\Models\Sasaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KermaController extends Controller
{
    // Menampilkan daftar kerma
    public function index(Request $request)
    {
        // Mengambil instansi id dari pengguna yang sedang login
        $instansiId = Auth::user()->instansi_id;

        // Mulai query Kerma dengan whereHas untuk mengfilter berdasarkan instansi pengguna
        $query = Kerma::with('penggiat_kermas.mitra')
            ->whereHas('penggiat_kermas', function ($query) use ($instansiId) {
                $query->where('mitra_id', $instansiId);
            });

        // Filter berdasarkan jenis dokumen kerma jika dipilih
        if ($request->filled('jenis_kerma_id')) {
            $query->where('jenis_kerma_id', $request->jenis_kerma_id);
        }

        // Filter berdasarkan sumber pendanaan
        if ($request->filled('sumber_pendanaan_id')) {
            $query->where('sumber_pendanaan_id', $request->sumber_pendanaan_id);
        }

        // Filter berdasarkan status kerma
        if ($request->filled('status_kerma_id')) {
            $query->where('status_kerma_id', $request->status_kerma_id);
        }

        // Filter berdasarkan bentuk kegiatan
        if ($request->filled('bentuk_kegiatan_id')) {
            $query->where('bentuk_kegiatan_id', $request->bentuk_kegiatan_id);
        }

        // Ambil data berdasarkan filter yang sudah diterapkan
        $dataKerma = $query->orderBy('created_at', 'desc')->get();

        // Ambil data untuk dropdown
        $jenis_kermas = JenisKerma::all();
        $sumber_pendanaans = SumberPendanaan::all();
        $status_kermas = StatusKerma::all();
        $bentuk_kegiatans = BentukKegiatan::all();

        // Tampilkan data ke view
        return view('kerma.index', compact('dataKerma', 'jenis_kermas', 'sumber_pendanaans', 'status_kermas', 'bentuk_kegiatans'));
    }


    // Menampilkan form untuk membuat kerma baru
    public function create()
    {
        return view('kerma.create', [
            'status_kermas' => StatusKerma::all(),
            'jenis_kermas' => JenisKerma::all(),
            'sumber_pendanaans' => SumberPendanaan::all(),
            'mitras' => Mitra::all(),
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all(),
            'bentuk_kegiatans' => BentukKegiatan::all(),
            'sasarans' => Sasaran::all(),
            'indikators' => Indikator::all()
        ]);
    }

    // Menyimpan data kerma baru
    public function store(Request $request)
    {
        // Validasi data kerma
        $validatedData = $request->validate([
            'status_kerma_id' => 'required|exists:status_kermas,id',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
            'jenis_kerma_id' => 'required|exists:jenis_kermas,id',
            'dokumen' => 'nullable|mimes:pdf|file|max:5120',
            'nomor_dokumen' => 'nullable|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'anggaran' => 'nullable|numeric',
            'sumber_pendanaan_id' => 'nullable|exists:sumber_pendanaans,id',
            'penggiat' => 'nullable|array',
            'penggiat.*.mitra_id' => 'nullable|exists:mitras,id',
            'penggiat.*.alamat' => 'nullable|string',
            'penggiat.*.nama_penandatangan' => 'nullable|string',
            'penggiat.*.jabatan_penandatangan' => 'nullable|string',
            'penggiat.*.nama_penanggungjawab' => 'nullable|string',
            'penggiat.*.jabatan_penanggungjawab' => 'nullable|string',
            'detail_kegiatan' => 'nullable|array',
            'detail_kegiatan.*.bentuk_kegiatan_id' => 'required|exists:bentuk_kegiatans,id',
            'detail_kegiatan.*.sasaran_id' => 'nullable|exists:sasarans,id',
            'detail_kegiatan.*.indikator_id' => 'nullable|exists:indikators,id',
            'detail_kegiatan.*.nilai_kontrak' => 'nullable|string',
            'detail_kegiatan.*.luaran' => 'nullable|string',
            'detail_kegiatan.*.keterangan' => 'nullable|string',
        ], [
            'status_kerma_id.required' => 'Status kerjasama belum ditentukan.',
            'tanggal_awal.required' => 'Tanggal awal kerjasama harus diisi.',
            'jenis_kerma_id.required' => 'Jenis dokumen kerjasama belum ditentukan.',
            'judul.required' => 'Judul kerjasama harus diisi.',
        ]);

        DB::beginTransaction();

        try {
            // Simpan dokumen jika ada
            if ($request->file('dokumen')) {
                $validatedData['dokumen'] = $request->file('dokumen')->store('documents');
            }

            // Simpan data kerma
            $kerma = Kerma::create($validatedData);

            // Simpan data penggiat jika ada
            if (!empty($validatedData['penggiat'])) {
                foreach ($validatedData['penggiat'] as $penggiatData) {
                    PenggiatKerma::create([
                        'kerma_id' => $kerma->id,
                        'mitra_id' => $penggiatData['mitra_id'],
                        'alamat' => $penggiatData['alamat'],
                        'nama_penandatangan' => $penggiatData['nama_penandatangan'],
                        'jabatan_penandatangan' => $penggiatData['jabatan_penandatangan'],
                        'nama_penanggungjawab' => $penggiatData['nama_penanggungjawab'] ?? null,
                        'jabatan_penanggungjawab' => $penggiatData['jabatan_penanggungjawab'] ?? null,
                    ]);
                }
            }

            // Simpan detail kegiatan jika ada
            if (!empty($validatedData['detail_kegiatan'])) {
                foreach ($validatedData['detail_kegiatan'] as $detailData) {
                    DetailKegiatan::create([
                        'kerma_id' => $kerma->id,
                        'bentuk_kegiatan_id' => $detailData['bentuk_kegiatan_id'],
                        'sasaran_id' => $detailData['sasaran_id'],
                        'indikator_id' => $detailData['indikator_id'],
                        'nilai_kontrak' => $detailData['nilai_kontrak'],
                        'luaran' => $detailData['luaran'],
                        'keterangan' => $detailData['keterangan'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json(["success" => true, "message" => 'Data Kerma Berhasil Ditambahkan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => 'Gagal menambahkan data. Silakan coba lagi.'], 500);
        }
    }

    // Menampilkan detail kerma
    public function show($id)
    {
        $kerma = Kerma::with('penggiat_kermas.mitra', 'detail_kegiatans.bentuk_kegiatan')->findOrFail($id);
        return view('kerma.show', compact('kerma'));
    }

    // Menampilkan form untuk edit kerma
    public function edit(Kerma $kerma)
    {
        return view('kerma.edit', [
            'kerma' => $kerma,
            'status_kermas' => StatusKerma::all(),
            'jenis_kermas' => JenisKerma::all(),
            'sumber_pendanaans' => SumberPendanaan::all(),
            'mitras' => Mitra::all(),
            'klasifikasi_mitras' => KlasifikasiMitra::all(),
            'countries' => Country::all(),
            'bentuk_kegiatans' => BentukKegiatan::all(),
            'sasarans' => Sasaran::all(),
            'indikators' => Indikator::all(),
            'penggiat_kermas' => $kerma->penggiat_kermas,
            'detail_kegiatans' => $kerma->detail_kegiatans,
        ]);
    }

    // Memperbarui data kerma
    public function update(Request $request, Kerma $kerma)
    {
        // Validasi data kerma
        $validatedData = $request->validate([
            'status_kerma_id' => 'required|exists:status_kermas,id',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
            'jenis_kerma_id' => 'required|exists:jenis_kermas,id',
            'dokumen' => 'nullable|mimes:pdf|file|max:5120',
            'nomor_dokumen' => 'nullable|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'anggaran' => 'nullable|numeric',
            'sumber_pendanaan_id' => 'nullable|exists:sumber_pendanaans,id',
            'penggiat' => 'nullable|array',
            'penggiat.*.mitra_id' => 'nullable|exists:mitras,id',
            'penggiat.*.alamat' => 'nullable|string',
            'penggiat.*.nama_penandatangan' => 'nullable|string',
            'penggiat.*.jabatan_penandatangan' => 'nullable|string',
            'penggiat.*.nama_penanggungjawab' => 'nullable|string',
            'penggiat.*.jabatan_penanggungjawab' => 'nullable|string',
            'detail_kegiatan' => 'nullable|array',
            'detail_kegiatan.*.bentuk_kegiatan_id' => 'nullable|exists:bentuk_kegiatans,id',
            'detail_kegiatan.*.sasaran_id' => 'nullable|exists:sasarans,id',
            'detail_kegiatan.*.indikator_id' => 'nullable|exists:indikators,id',
            'detail_kegiatan.*.nilai_kontrak' => 'nullable|string',
            'detail_kegiatan.*.luaran' => 'nullable|string',
            'detail_kegiatan.*.keterangan' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // Update dokumen jika ada
            if ($request->file('dokumen')) {
                if ($kerma->dokumen) {
                    Storage::delete($kerma->dokumen); // Hapus dokumen lama
                }
                $validatedData['dokumen'] = $request->file('dokumen')->store('documents');
            } else {
                $validatedData['dokumen'] = $kerma->dokumen; // Tetap gunakan dokumen lama jika tidak ada dokumen baru
            }

            // Update data kerma
            $kerma->update($validatedData);

            // Hapus penggiat lama dan simpan yang baru jika ada
            if (!empty($kerma->penggiat_kermas)) {
                $kerma->penggiat_kermas()->delete();
            }

            if (!empty($validatedData['penggiat'])) {
                foreach ($validatedData['penggiat'] as $penggiatData) {
                    PenggiatKerma::create([
                        'kerma_id' => $kerma->id,
                        'mitra_id' => $penggiatData['mitra_id'],
                        'alamat' => $penggiatData['alamat'],
                        'nama_penandatangan' => $penggiatData['nama_penandatangan'],
                        'jabatan_penandatangan' => $penggiatData['jabatan_penandatangan'],
                        'nama_penanggungjawab' => $penggiatData['nama_penanggungjawab'] ?? null,
                        'jabatan_penanggungjawab' => $penggiatData['jabatan_penanggungjawab'] ?? null,
                    ]);
                }
            }

            // Hapus detail kegiatan lama dan simpan yang baru jika ada
            if (!empty($kerma->detail_kegiatans)) {
                $kerma->detail_kegiatans()->delete();
            }

            if (!empty($validatedData['detail_kegiatan'])) {
                foreach ($validatedData['detail_kegiatan'] as $detailData) {
                    DetailKegiatan::create([
                        'kerma_id' => $kerma->id,
                        'bentuk_kegiatan_id' => $detailData['bentuk_kegiatan_id'],
                        'sasaran_id' => $detailData['sasaran_id'],
                        'indikator_id' => $detailData['indikator_id'],
                        'nilai_kontrak' => $detailData['nilai_kontrak'],
                        'luaran' => $detailData['luaran'],
                        'keterangan' => $detailData['keterangan'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json(["success" => true, "message" => 'Data Kerma Berhasil Diperbarui!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => 'Gagal memperbarui data. Silakan coba lagi.'], 500);
        }
    }

    // Menghapus kerma
    public function destroy(Kerma $kerma)
    {
        DB::beginTransaction();

        try {
            // Hapus dokumen jika ada
            if ($kerma->dokumen) {
                Storage::delete($kerma->dokumen);
            }

            // Hapus semua penggiat dan detail kegiatan
            $kerma->penggiat_kermas()->delete();
            $kerma->detail_kegiatans()->delete();

            // Hapus data kerma
            $kerma->delete();

            DB::commit();
            return response()->json(["success" => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => 'Gagal menghapus data. Silakan coba lagi.'], 500);
        }
    }
}
