<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sasaran()
    {
        return $this->belongsTo(Sasaran::class);
    }
}
