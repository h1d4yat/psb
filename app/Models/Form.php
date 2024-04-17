<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'user_id',
        'no_pendaftaran',
        // biodata penguna
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
        // alamat
        'rt',
        'rw',
        'dusun',
        'jalan',
        'kabupaten',
        'provinsi',
        'kecamatan',
        'desa',
        'kode_pos',
        // orang tua atau wali
        'orangtua_wali',
        // data priodik
        'tinggi_badan',
        'berat_badan',
        'jarak_rumah_kesekolah',
        'anak_ke',
        'jumlah_saudara_kandung',
        // pendaftaran dan status
        'jurusan_id',
        'jalur_pendaftaran_id',
        'status',
        'status_akhir',
        'catatan_status_akhir',
        'is_lock',
    ];
    protected $casts = [
        'orangtua_wali' => 'array',
    ];

    public function alamat()
    {
        $fields = [
            'rt',
            'rw',
            'dusun',
            'jalan',
            'kabupaten',
            'provinsi',
            'kecamatan',
            'desa',
            'kode_pos',
        ];
        $alamat = self::first()->toArray();
        return array_intersect_key($alamat, array_flip($fields));
    }
    public function biodata(){
        $data = self::first()->toArray();
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
        return array_intersect_key($data, array_flip($fields));
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
