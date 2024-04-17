<?php

use App\Http\Controllers\Forms\BiodataController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
     * Buat Pendaftaran
     */
    Route::prefix('form')->name('form.')->group(function () {
        Route::get('/new', [FormulirController::class, 'new'])->name('new');
        Route::post('/new', [FormulirController::class, 'simpanBaru'])->name('simpan_baru');
        Route::namespace('App\Http\Controllers\Form')->group(function () {
            Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
            Route::post('/biodata', [BiodataController::class, 'simpan'])->name('biodata.save');
        });
    });
});

require __DIR__.'/auth.php';
