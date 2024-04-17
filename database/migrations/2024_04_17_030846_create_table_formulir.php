<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('no_pendaftaran')->nullable();
            // biodata
            $table->char('nisn', 10)->nullable();
            $table->char('nik', 16)->nullable();
            $table->string('nama', 150)->nullable();
            $table->enum('jenis_kelamin', [
                'L',
                'P',
            ])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->enum('agama', [
                'islam',
                'protestan',
                'katolik',
                'hindu',
                'budha',
                'Kong Hu Cu',
            ])->nullable();
            $table->enum('golongan_darah', [
                'A',
                'B',
                'AB',
                'O',
            ])->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('alat_transportasi')->nullable();
            $table->char('no_telp', 12)->nullable();
            $table->string('email')->nullable();
            // alamat
            $table->char('rt', 5)->nullable();
            $table->char('rw', 5)->nullable();
            $table->string('dusun')->nullable();
            $table->string('jalan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->char('kode_pos', 6)->nullable();
            $table->string('pas_foto')->nullable()->nullable();
            $table->string('no_kip')->nullable();
            $table->string('no_kis')->nullable();
            $table->string('no_kks')->nullable();
            $table->string('no_sktm')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            // orang tua
            $table->json('orangtua_wali')->nullable();
            // data priodik
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('jarak_rumah_kesekolah')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            // jurusan
            $table->foreignUuid('jurusan_id')->constrained('jurusans')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignUuid('jalur_pendaftaran_id')->constrained('jalur_pendaftarans')->cascadeOnUpdate()->restrictOnDelete();
            // status
            $table->enum('status', [
                'pending',
                'submitted',
                'rejected',
                'approved',
            ])->nullable();
            $table->enum('status_akhir', [
                'pending',
                'approved',
                'rejected',
            ])->nullable();
            $table->text('catatan_status_akhir')->nullable();
            $table->boolean('is_lock')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
