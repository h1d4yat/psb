<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasUuids;
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'aktif',
    ];
    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function getOption()
    {
        return self::whereAktif(true)->get()->map(function ($item) {
            return [
                'key' => $item->id,
                'value' => $item->nama,
            ];
        });
    }
}
