<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bentuk_kegiatans()
    {
        return $this->hasMany(BentukKegiatan::class);
    }
}
