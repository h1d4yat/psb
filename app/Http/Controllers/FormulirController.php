<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormulirController extends Controller
{
    public function new(JalurPendaftaran $jalurPendaftaran, Jurusan $jurusan)
    {
        return Inertia::render('BuatFormulir/index')
        ->with('jurusans', $jurusan->getOption())
        ->with('jalur_pendaftarans', $jalurPendaftaran->getOption());
    }

    public function simpanBaru(Request $request)
    {
        $validated = $request->validate([
            'jalur_pendaftaran_id' => 'required',
            'jurusan_id' => 'required',
            'jenis_pendaftaran' => 'required|in:baru,pindahan',
        ], [
            'required' => 'Isian :attributes Tidak boleh kosong',
        ], [
            'jalur_pendaftaran_id' => 'Jalur Pendftaran',
            'jurusan_id' => 'Jurusan',
            'jenis_pendaftaran' => 'Jenis Pendaftaran',
        ]);

        return $validated;
    }
}
