<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\JalurPendaftaran;
use App\Models\Jurusan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::createOrFirst([
            'name' => 'Test User',
            'email' => '123@123.com',
            'password' => Hash::make('123')
        ]);
        $this->call(KebutuhanKhususSeeder::class);
        $this->call(JalurPendaftaranSeeder::class);
        $this->call(JurusanSeeder::class);
        Form::factory(10)->create();

       
    }
}
