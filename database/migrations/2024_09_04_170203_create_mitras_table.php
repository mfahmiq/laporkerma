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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->foreignId('klasifikasi_mitra_id');
            $table->string('nama_institusi');
            $table->text('alamat');
            $table->string('telp')->nullable();
            $table->string('website')->nullable();
            $table->string('status')->default('Digunakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
