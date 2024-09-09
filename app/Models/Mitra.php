<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483

class Mitra extends Model
{
    use HasFactory;
<<<<<<< HEAD

=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
    protected $guarded = ['id'];
    
    public function country() 
    {
        return $this->belongsTo(Country::class);
    }

<<<<<<< HEAD
    public function klasifikasi_mitra() 
    {
        return $this->belongsTo(KlasifikasiMitra::class);
    }

=======
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
}
