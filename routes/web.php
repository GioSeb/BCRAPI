<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
});

Route::get('/select', function(){
    return view('select');
});

Route::get('/nuevo-informe', function () {
    return view('nuevo-informe');
});

Route::middleware(['auth', 'can:manage-users']) // Apply middleware here
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
        // Add any other admin routes here
});

/* MODIFY TO MATCH BREEZE */

Route::get('/panel', function (){
    return view('admin.users.panel');
});
