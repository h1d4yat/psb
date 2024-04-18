<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public function kabupaten(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function desa(){
        return $this->hasMany(DesaKelurahan::class);
    }
}
