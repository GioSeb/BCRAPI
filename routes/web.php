<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\SelectViewController;

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

// Define the route for the select view
Route::get('/select', [SelectViewController::class, 'index'])
    ->middleware(['auth']) // <-- Apply auth middleware HERE
    ->name('select.view'); // <-- Give it a name for easy reference

Route::get('/nuevo-informe', function () {
    return view('nuevo-informe');
});

Route::get('/informe', function (){
    return view('informe', [InformeController::class, 'fetchInforme']);
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

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
