<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    use HasUuids;
    use HasFactory;
    protected $fillable = [
        'nama',
        'start',
        'end',
        'persyaratan',
        'deskripsi',
        'aktif',
    ];
    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function getOption()
    {
        $d = self::where('start', '<=', now())->where('end', '>=', now())->get();

        return $d->map(function ($item) {
            return [
                'key' => $item->id,
                'value' => $item->nama,
            ];
        });
    }
}
