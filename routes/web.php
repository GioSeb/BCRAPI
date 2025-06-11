<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\NuevoInformeController;
use App\Http\Controllers\PanelViewController;
use App\Http\Controllers\SelectViewController;
use App\Models\User;



Route::get('/', function () {
    return view('index');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

// AUTH = 1 2 3

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/select', [SelectViewController::class, 'index'])->name('select');
    Route::get('/nuevo-informe', [NuevoInformeController::class, 'index'])->name('nuevo-informe');
    Route::get('/informe', function (){
            return view('informe', [InformeController::class, 'fetchInforme']);
        })->name('informe');

});

// AUTH = 2 3

Route::middleware(['auth', 'can:manage-users']) // Apply middleware here
    ->prefix('admin') // This means all URIs start with /admin
    ->name('admin.') // This means all route names start with 'admin.' (e.g., admin.users.index)
    ->group(function () {
        Route::resource('users', UserController::class);
    });

/* MODIFY TO MATCH BREEZE */

// DOS RUTAS PARA PANEL???

/* Route::get('/panel', function () {
    // Fetch the users here
    $users = User::with('role') // Eager load roles if needed
                 ->latest()
                 ->paginate(15); //TO DO escalar paginate

    // Now $users is defined and contains the user data
    return view('admin.users.panel', ['users' => $users]);
})->middleware(['auth', 'can:manage-users'])->name('panel.view'); */

/* TO DO register temporal, cambiar a admin/users/create.blade */
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

/* // TO DO auth para acceder al panel si sos admin
Route::middleware(['auth', 'can:manage-users'])->prefix('admin')->name('admin.')->group(function () {
    // This route will handle GET requests to /admin/users and call UserController@index
    Route::get('/panel', [UserController::class, 'index'])->name('panel');
}); */

// TO DO modify logged user

//Create user
Route::post('/crear/usuario', [UserController::class, 'store']);

require __DIR__.'/auth.php';
