<?php

namespace App\Models;

use App\Models\Tujuan;
use App\Models\Antrian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayat extends Model
{
    use HasFactory;

    public function tujuan(){
        return $this->belongsTo(Tujuan::class);
    }

    public function antrian(){
        return $this->belongsTo(Antrian::class);
    }
}
