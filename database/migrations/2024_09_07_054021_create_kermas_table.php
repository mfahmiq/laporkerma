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
            $table->foreignId('jenis_kerma_id')->constrained()->onDelete('cascade');
            $table->foreignId('sumber_pendanaan_id')->constrained()->onDelete('cascade');
            $table->foreignId('status_kerma_id')->constrained()->onDelete('cascade');
            $table->foreignId('kondisi_tertentu_id')->nullable()->constrained()->onDelete('set null');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('dokumen')->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->text('anggaran')->nullable();
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
