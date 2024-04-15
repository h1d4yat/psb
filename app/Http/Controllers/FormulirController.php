<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class FormulirController extends Controller
{
    public function new()
    {
        return Inertia::render('BuatFormulir/index');
    }
}
