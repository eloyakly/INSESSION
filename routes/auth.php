<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rutas de Autenticación y Perfil de Usuario
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class , 'login'])->name('login');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class , 'register'])->name('register');

Route::get('/profile', function () {
// Edición de datos
})->name('profile.edit');

Route::post('/logout', function () {
// Cerrar sesión
})->name('logout');
