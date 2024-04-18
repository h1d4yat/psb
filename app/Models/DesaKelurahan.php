<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaKelurahan extends Model
{
    use HasFactory;
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
