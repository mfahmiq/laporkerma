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
        Schema::create('detail_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kerma_id')->nullable()->constrained('kermas')->onDelete('cascade'); // Menghubungkan ke tabel kermas
            $table->foreignId('bentuk_kegiatan_id')->nullable()->constrained('bentuk_kegiatans')->onDelete('cascade'); // Menghubungkan ke tabel bentuk_kegiatans
            $table->foreignId('sasaran_id')->nullable()->constrained('sasarans')->onDelete('set null'); // Menghubungkan ke tabel sasarans
            $table->foreignId('indikator_id')->nullable()->constrained('indikators')->onDelete('set null'); // Menghubungkan ke tabel indikator
            $table->string('nilai_kontrak')->nullable(); // Menggunakan decimal untuk nilai kontrak
            $table->string('luaran')->nullable(); // Jika luaran adalah nama, gunakan string
            $table->text('keterangan')->nullable(); // Keterangan bersifat opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kegiatans');
    }
};
