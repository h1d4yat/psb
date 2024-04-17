<?php

namespace Database\Factories;

use App\Models\JalurPendaftaran;
use App\Models\Jurusan;
use App\Models\KebutuhanKhusus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid,
            'no_pendaftaran' => fake()->unique()->randomNumber(8),
            'nisn' => fake()->numerify('############'),
            'nik' => fake()->numerify('################'),
            'nama' => fake()->name,
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'tempat_lahir' => fake()->city,
            'tanggal_lahir' => fake()->date,
            'agama' => fake()->randomElement(['islam', 'protestan', 'katolik', 'hindu', 'budha', 'Kong Hu Cu']),
            'golongan_darah' => fake()->randomElement(['A', 'B', 'AB', 'O']),
            'tempat_tinggal' => fake()->city,
            'alat_transportasi' => fake()->randomElement(['Sepeda', 'Motor', 'Mobil', 'Kereta', 'Bus']),
            'no_telp' => fake()->numerify('###########'),
            'email' => fake()->email,
            'rt' => fake()->numerify('####'),
            'rw' => fake()->numerify('####'),
            'dusun' => fake()->streetName,
            'jalan' => fake()->streetName,
            'kabupaten' => fake()->city,
            'provinsi' => fake()->state,
            'kecamatan' => fake()->citySuffix,
            'desa' => fake()->citySuffix,
            'kode_pos' => fake()->postcode,
            'pas_foto' => fake()->imageUrl(),
            'no_kip' => fake()->numerify('##############'),
            'no_kis' => fake()->numerify('##############'),
            'no_kks' => fake()->numerify('##############'),
            'no_sktm' => fake()->numerify('##############'),
            'hobi' => fake()->randomElement(['Olahraga', 'Membaca', 'Seni', 'Musik', 'Traveling']),
            'cita_cita' => fake()->randomElement(['Dokter', 'Pengusaha', 'PNS', 'Seniman', 'Atlet']),
            'orangtua_wali' => json_encode([
                'nama' => fake()->name,
                'pekerjaan' => fake()->jobTitle,
                'alamat' => fake()->address,
            ]),
            'tinggi_badan' => fake()->numberBetween(150, 200),
            'berat_badan' => fake()->numberBetween(40, 100),
            'jarak_rumah_kesekolah' => fake()->numberBetween(1, 20),
            'anak_ke' => fake()->numberBetween(1, 10),
            'jumlah_saudara_kandung' => fake()->numberBetween(0, 10),
            'jurusan_id' => function () {
                return Jurusan::inRandomOrder()->first()->id;
            },
            'jalur_pendaftaran_id' => function () {
                return JalurPendaftaran::inRandomOrder()->first()->id;
            },
            'kebutuhan_khusus_id' => function () {
                return KebutuhanKhusus::inRandomOrder()->first()->id;
            },
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'status' => fake()->randomElement(['pending', 'submitted', 'rejected', 'approved']),
            'status_akhir' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'catatan_status_akhir' => fake()->sentence,
            'is_lock' => fake()->boolean,
        ];
    }
}
