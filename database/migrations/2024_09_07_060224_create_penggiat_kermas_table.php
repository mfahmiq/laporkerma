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
            $table->foreignId('kerma_id')->nullable()->constrained('kermas')->onDelete('cascade');
            $table->foreignId('mitra_id')->nullable()->constrained('mitras')->onDelete('cascade');
            $table->foreignId('unit_pelaksana_id')->nullable()->constrained()->onDelete('set null');
            $table->text('alamat')->nullable();
            $table->string('nama_penandatangan')->nullable();
            $table->string('jabatan_penandatangan')->nullable();
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
