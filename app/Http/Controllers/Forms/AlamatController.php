<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Models\DesaKelurahan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use App\Models\User;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AlamatController extends Controller
{
    public function index(FormService $formService)
    {
        return Inertia::render("Forms/Alamat", [
            'data' => $formService->getAlamat(Auth::user()),
            'wilayah' => [
                'provinsi' => Provinsi::all(),
            ],
        ]);
    }
}
