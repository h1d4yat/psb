<?php

namespace Database\Seeders;

use App\Models\JalurPendaftaran;
use Illuminate\Database\Seeder;

class JalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JalurPendaftaran::createOrFirst([
            'nama' => 'UMUM',
            'start' => now(),
            'end' => now()->addMonths(1),
            'persyaratan' => fake()->sentence(),
            'deskripsi' => fake()->text(200),
            'aktif' => true,
        ]);
        JalurPendaftaran::createOrFirst([
            'nama' => 'PRESTASI',
            'start' => now(),
            'end' => now()->addMonths(1),
            'persyaratan' => fake()->sentence(),
            'deskripsi' => fake()->text(200),
            'aktif' => true,
        ]);
        JalurPendaftaran::createOrFirst([
            'nama' => 'MANDIRI',
            'start' => now(),
            'end' => now()->addMonths(1),
            'persyaratan' => fake()->sentence(),
            'deskripsi' => fake()->text(200),
            'aktif' => true,
        ]);
    }
}
