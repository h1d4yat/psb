<?php

namespace App\Http\Controllers\Forms;

use App\Exceptions\FormException;
use App\Http\Controllers\Controller;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BiodataController extends Controller
{
    public function index(FormService $formService)
    {
        $formService->getProgress();
        $data = $formService->getBiodata(Auth::user());

        return Inertia::render('Forms/Biodata')->with('data', $data);
    }

    public function simpan(Request $request, FormService $formService)
    {
        $data = $request->validate([
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'tempat_tinggal' => 'required',
            'alat_transportasi' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'pas_foto' => 'nullable',
            'no_kip' => 'nullable',
            'no_kis' => 'nullable',
            'no_kks' => 'nullable',
            'no_sktm' => 'nullable',
            'hobi' => 'nullable',
            'cita_cita' => 'nullable',
        ]);
        try {
            $formService->simpanBiodata($data);

            return Redirect::back()->withErrors([
                'success' => 'Berhasil menyimpan biodata',
            ]);
        } catch (FormException $formException) {
            return Redirect::back()->withErrors([
                'error' => 'Gagal Menyimpan biodata',
            ]);
        }
    }
}
