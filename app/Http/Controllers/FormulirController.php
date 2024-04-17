<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\JalurPendaftaran;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FormulirController extends Controller
{
    public function new(JalurPendaftaran $jalurPendaftaran, Jurusan $jurusan, Form $form)
    {
        return Inertia::render('BuatFormulir/index')
        ->with('jurusans', $jurusan->getOption())
        ->with('jalur_pendaftarans', $jalurPendaftaran->getOption());
    }

    public function simpanBaru(Request $request)
    {
        if ($request->user()->form) {
            return redirect()->back();
        }
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
        $validated['user_id'] = Auth::id();
        Form::firstOrCreate($validated);

        return Redirect::back()->withErrors([
            'suksess' => true,
        ]);
    }
}
