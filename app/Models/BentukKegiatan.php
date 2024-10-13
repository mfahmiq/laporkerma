<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detail_kegiatans()
    {
        return $this->hasMany(DetailKegiatan::class);
    }
}
