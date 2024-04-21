<?php

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    /*
     * Buat Pendaftaran
     */
    Route::prefix('form')->name('form.')->group(function () {
        Route::get('/new', [App\Http\Controllers\FormulirController::class, 'new'])->name('new');
        Route::post('/new', [App\Http\Controllers\FormulirController::class, 'simpanBaru'])->name('simpan_baru');
        Route::namespace('App\Http\Controllers\Form')->middleware(App\Http\Middleware\FormulirMiddleware::class)->group(function () {
            Route::get('/biodata', [App\Http\Controllers\Forms\BiodataController::class, 'index'])->name('biodata');
            Route::post('/biodata', [App\Http\Controllers\Forms\BiodataController::class, 'simpan'])->name('biodata.save');
            // alamat
            Route::get('/alamat', [App\Http\Controllers\Forms\AlamatController::class, 'index'])->name('alamat');
            Route::post('/alamat', [App\Http\Controllers\Forms\AlamatController::class, 'simpan'])->name('alamat.simpan');
            //priodik
            Route::get('/alamat', [App\Http\Controllers\Forms\AlamatController::class, 'index'])->name('alamat');
            Route::post('/alamat', [App\Http\Controllers\Forms\AlamatController::class, 'simpan'])->name('alamat.simpan');
        });
    });
});

require __DIR__.'/auth.php';
