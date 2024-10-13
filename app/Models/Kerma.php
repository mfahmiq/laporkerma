<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerma extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke StatusKerma
    public function status_kerma()
    {
        return $this->belongsTo(StatusKerma::class);
    }

    // Relasi ke JenisKerma
    public function jenis_kerma()
    {
        return $this->belongsTo(JenisKerma::class);
    }

    // Relasi ke SumberPendanaan
    public function sumber_pendanaan()
    {
        return $this->belongsTo(SumberPendanaan::class);
    }

    // Relasi One-to-Many ke PenggiatKerma
    public function penggiat_kermas()
    {
        return $this->hasMany(PenggiatKerma::class);
    }

    public function detail_kegiatans()
    {
        return $this->hasMany(DetailKegiatan::class);
    }
}
