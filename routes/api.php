<?php

use App\Http\Controllers\HistorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fetch-historial', [HistorialController::class, 'fetch'])->name('historial.fetch');
