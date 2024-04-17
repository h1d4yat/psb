<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BiodataController extends Controller
{
    public function index(FormService $formService)
    {
        $data = $formService->getBiodata(Auth::user());

        return Inertia::render('Forms/Biodata')->with('data', $data);
    }

    public function simpan(Request $request, FormService $formService)
    {
        $data = $request->validate([
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'agama' => 'nullable',
            'golongan_darah' => 'nullable',
            'tempat_tinggal' => 'nullable',
            'alat_transportasi' => 'nullable',
            'no_telp' => 'nullable',
            'email' => 'nullable',
            'pas_foto' => 'nullable',
            'no_kip' => 'nullable',
            'no_kis' => 'nullable',
            'no_kks' => 'nullable',
            'no_sktm' => 'nullable',
            'hobi' => 'nullable',
            'cita_cita' => 'nullable',
        ]);
        $formService->simpanBiodata($data);
    }
}
