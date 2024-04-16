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
        Jurusan::create([
            'kode' => 'RPL',
            'nama' => 'Rekayasa Perangkat Lunak',
            'aktif' => true,
        ]);
        Jurusan::create([
            'kode' => 'TKJ',
            'nama' => 'Teknik Kendaraan Ringan',
            'aktif' => true,
        ]);
        Jurusan::create([
            'kode' => 'TKRO',
            'nama' => 'Teknik Kendaran Ringan Otomotif',
            'aktif' => true,
        ]);
    }
}
