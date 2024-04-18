<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DesaKelurahan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getKabupaten(Provinsi $provinsi){
        return [
            'provinsi' => $provinsi->name,
            'data' => $provinsi->kabupaten_kota,
        ];
    }
    public function getKecamatan(Kabupaten $kabupaten){
        return [
            'kabupaten' => $kabupaten->name,
            'data' => $kabupaten->kecamatan,
        ];
    }
    public function getDesa(Kecamatan $kecamatan){
        return [
            'kecamatan' => $kecamatan->name,
            'data' => $kecamatan->desa,
        ];
    }
}
