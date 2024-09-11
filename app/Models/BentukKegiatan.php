<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kermas()
    {
        return $this->hasMany(Kerma::class);
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
