<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;


// Solo usuarios con sesión activa (cookie válida) pueden entrar aquí
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [AuthController::class, 'verPerfil']);
    Route::get('/chat', [ChatController::class, 'index']);
});
