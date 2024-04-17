<?php

namespace Database\Seeders;

use App\Models\KebutuhanKhusus;
use Illuminate\Database\Seeder;

class KebutuhanKhususSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kbh = [
            'Autis',
            'Bakat Istimewa',
            'Cerdas Istimewa',
            'Down Sindrome',
            'Hiper Aktif',
            'Indigo',
            'Kesulitan belajar',
            'Narkoba',
            'Tuna Daksa Ringan',
            'Tuna Daksa Sedang',
            'Tuna Ganda',
            'Boti',
            'Tuna Laras',
            'Tuna Netra',
            'Tuna Wicara',
            'Bencong',
        ];
        foreach ($kbh as $val) {
            KebutuhanKhusus::createOrFirst([
                'nama' => $val,
            ]);
        }
    }
}
