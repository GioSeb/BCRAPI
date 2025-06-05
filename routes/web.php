<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\SelectViewController;
use App\Models\User;


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

// DOS RUTAS PARA PANEL???

Route::get('/panel', function () {
    // Fetch the users here
    $users = User::with('role') // Eager load roles if needed
                 ->latest()
                 ->paginate(15); //TO DO escalar paginate

    // Now $users is defined and contains the user data
    return view('admin.users.panel', ['users' => $users]);
})->middleware(['auth', 'can:manage-users'])->name('panel.view');

/* TO DO register temporal, cambiar a admin/users/create.blade */
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// TO DO auth para acceder al panel si sos admin
Route::middleware(['auth', 'can:manage-users'])->prefix('admin')->name('admin.')->group(function () {
    // This route will handle GET requests to /admin/users and call UserController@index
    Route::get('/panel', [UserController::class, 'index'])->name('panel');
});

//TO DO auth to create
Route::get('/create', function (){
    return view('admin.users.create');
});

//Create user
Route::post('/crear/usuario', [UserController::class, 'store']);
