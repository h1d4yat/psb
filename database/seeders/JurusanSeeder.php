<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::createOrFirst([
            'kode' => 'RPL',
            'nama' => 'Rekayasa Perangkat Lunak',
            'aktif' => true,
        ]);
        Jurusan::createOrFirst([
            'kode' => 'TKJ',
            'nama' => 'Teknik Kendaraan Ringan',
            'aktif' => true,
        ]);
        Jurusan::createOrFirst([
            'kode' => 'TKRO',
            'nama' => 'Teknik Kendaran Ringan Otomotif',
            'aktif' => true,
        ]);
    }
}
