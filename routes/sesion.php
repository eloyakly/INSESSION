<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\NoCacheHeaders;


// Solo usuarios con sesión activa (cookie válida) pueden entrar aquí
Route::middleware(['auth', NoCacheHeaders::class])->group(function () {
    Route::get('/perfil', [AuthController::class, 'verPerfil']);
    Route::get('/chat', [ChatController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
