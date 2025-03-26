<?php

use App\Http\Controllers\HistorialController;
use App\Http\Controllers\InformeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fetch-informe', [HistorialController::class, 'fetchHistorial'])->name('informe.fetch');
