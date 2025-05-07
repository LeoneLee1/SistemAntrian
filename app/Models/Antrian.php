<?php

namespace App\Models;

use App\Models\Tujuan;
use App\Models\Riwayat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antrian extends Model
{
    use HasFactory;

    public function tujuan(){
        return $this->belongsTo(Tujuan::class);
    }

    public function riwayat(){
        return $this->hasMany(Riwayat::class);
    }
}
