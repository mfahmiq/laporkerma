<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberPendanaan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kermas()
    {
        return $this->hasMany(Kerma::class);
    }
}
