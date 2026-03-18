<?php

use Illuminate\Support\Facades\Route;

// Landing / Index pincipal
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

require __DIR__.'/auth.php';
require __DIR__.'/sesion.php';
require __DIR__.'/musica.php';
