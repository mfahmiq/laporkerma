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
        Schema::create('bentuk_kegiatans', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('sasaran_id');
            $table->foreignId('indikator_id');
=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_kegiatans');
    }
};
