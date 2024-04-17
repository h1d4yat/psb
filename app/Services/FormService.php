<?php

namespace App\Services;

use App\Models\Form;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class FormService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function getBiodata(User|Authenticatable $user)
    {
        $biodata = Form::where('user_id', $user->id)->first()->toArray();
        $fields = [
        'nisn',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'golongan_darah',
        'tempat_tinggal',
        'alat_transportasi',
        'no_telp',
        'email',
        'pas_foto',
        'no_kip',
        'no_kis',
        'no_kks',
        'no_sktm',
        'hobi',
        'cita_cita',
        ];

        return array_intersect_key($biodata, array_flip($fields));
    }
}
