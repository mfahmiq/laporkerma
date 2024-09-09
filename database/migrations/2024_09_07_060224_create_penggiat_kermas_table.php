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
        Schema::create('penggiat_kermas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instansi_id');
            $table->foreignId('unit_pelaksana_id');
            $table->text('alamat');
            $table->string('nama_penandatangan');
            $table->string('jabatan_penandatangan');
            $table->string('nama_penanggungjawab')->nullable();
            $table->string('jabatan_penanggungjawab')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggiat_kermas');
    }
};
