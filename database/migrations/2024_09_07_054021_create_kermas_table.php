<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kermas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kerma_id');
            $table->foreignId('sumber_pendanaan_id');
            $table->foreignId('status_kerma_id');
            $table->foreignId('kondisi_tertentu_id');
            $table->foreignId('penggiat_kerma_id');
            $table->foreignId('bentuk_kegiatan_id');
<<<<<<< HEAD
            $table->foreignId('country_id');
            $table->foreignId('klasifikasi_mitra_id');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
=======
            $table->date('tanggal_awal')->default(new DateTime());
            $table->date('tanggal_akhir')->default(new DateTime());
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
            $table->string('nomor_dokumen');
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kermas');
    }
};
