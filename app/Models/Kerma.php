<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerma extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $guarded = ['id'];
    
    public function country() 
    {
        return $this->belongsTo(Country::class);
    }

    public function klasifikasi_mitra() 
    {
        return $this->belongsTo(KlasifikasiMitra::class);
    }

    public function jenis_kerma() 
    {
        return $this->belongsTo(JenisKerma::class);
    }

    public function sumber_pendanaan() 
    {
        return $this->belongsTo(SumberPendanaan::class);
    }

    public function status_kerma() 
    {
        return $this->belongsTo(StatusKerma::class);
    }

    public function bentuk_kegiatan() 
    {
        return $this->belongsTo(BentukKegiatan::class);
    }
=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
}
