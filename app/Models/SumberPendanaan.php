<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberPendanaan extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $guarded = ['id'];

    public function kermas()
    {
        return $this->hasMany(Kerma::class);
    }
=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
}
