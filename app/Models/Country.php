<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483

class Country extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = ['id'];

    public function mitras()
    {
=======
    protected $fillable = ['id', 'name'];

    public function mitras(): HasMany {
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
        return $this->hasMany(Mitra::class);
    }
}
