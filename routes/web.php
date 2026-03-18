<?php

use Illuminate\Support\Facades\Route;

// Landing / Index pincipal
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Rutas de Mensajería
Route::get('/chat', function () {
    return view('chat.index');
})->name('chat.index');

// Demostración de chat individual
Route::get('/chat/{id}', function ($id) {
    return view('chat.show');
})->name('chat.show');
