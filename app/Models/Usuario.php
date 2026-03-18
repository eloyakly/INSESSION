<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // IMPORTANTE: Debe ser este
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios'; // Aquí le decimos a Laravel que la tabla es 'usuarios'

    protected $fillable = [
        'nombre', 'apellido', 'correo', 'clave', 'foto', 'frase', 'nivel'
    ];

    protected $hidden = [
        'clave', 'remember_token',
    ];

    // Indicarle a Laravel que use 'clave' en lugar de 'password' para las verificaciones
    public function getAuthPassword()
    {
        return $this->clave;
    }
}

