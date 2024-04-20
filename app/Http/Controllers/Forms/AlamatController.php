<?php

namespace App\Http\Controllers\Forms;

use App\Exceptions\FormException;
use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AlamatController extends Controller
{
    public function index(FormService $formService)
    {
        return Inertia::render('Forms/Alamat', [
            'data' => $formService->getAlamat(Auth::user()),
            'wilayah' => [
                'provinsi' => Provinsi::all(),
            ],
        ]);
    }

    public function simpan(Request $request, FormService $formService)
    {
        $validated = $request->validate([
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'jalan' => 'nullable',
            'kabupaten' => 'nullable',
            'provinsi' => 'nullable',
            'kecamatan' => 'nullable',
            'desa' => 'nullable',
            'kode_pos' => 'nullable',
        ]);
        try {
            $formService->simpanAlamat($validated);

            return Redirect::back()->withErrors(['success' => 'Alamat Berhasil di simpan']);
        } catch (FormException  $formException) {
            Redirect::back()->withErrors([
                'error' => 'Alamat Berhasil di simpan',
            ]);
            Log::error($formException->getMessage());
        }
    }
}
