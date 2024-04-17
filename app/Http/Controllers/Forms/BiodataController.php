<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Services\FormService;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BiodataController extends Controller
{
    public function index(FormService $formService)
    {
        $data = $formService->getBiodata(Auth::user());

        return Inertia::render('Forms/Biodata')->with('data', $data);
    }
}
