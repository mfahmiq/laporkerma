<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke model Kerma
    public function kerma()
    {
        return $this->belongsTo(Kerma::class);
    }

    public function bentuk_kegiatan()
    {
        return $this->belongsTo(BentukKegiatan::class);
    }
    
    public function sasaran()
    {
        return $this->belongsTo(Sasaran::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
