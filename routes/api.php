<?php

use App\Models\Api\WilayahController;
use Illuminate\Support\Facades\Route;

Route::prefix('wilayah')->group(function(){
    Route::get('/kabupaten/{provinsi}', [App\Http\Controllers\Api\WilayahController::class,'getKabupaten']);
    Route::get('/kecamatan/{kabupaten}', [App\Http\Controllers\Api\WilayahController::class,'getKecamatan']);
    Route::get('/desa/{kecamatan}', [App\Http\Controllers\Api\WilayahController::class,'getDesa']);
});