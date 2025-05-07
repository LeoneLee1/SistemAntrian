<?php

namespace App\Models;

use App\Models\Antrian;
use App\Models\Riwayat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tujuan extends Model
{
    use HasFactory;

    public function antrian(){
        return $this->hasMany(Antrian::class);
    }

    public function riwayat(){
        return $this->hasMany(Riwayat::class);
    }
}
