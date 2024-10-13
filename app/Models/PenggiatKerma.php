<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggiatKerma extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Kerma
    public function kerma()
    {
        return $this->belongsTo(Kerma::class);
    }

    // Relasi ke model Mitra
    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
