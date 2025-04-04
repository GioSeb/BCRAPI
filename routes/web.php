<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/select', function(){
    return view('select');
});

Route::get('/nuevo-informe', function () {
    return view('nuevo-informe');
});
