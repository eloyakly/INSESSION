<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //usar la tabla usuarios
    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'apellido', 'correo', 'clave', 'foto', 'frase', 'nivel'];
    protected $hidden = ['clave'];
    // Relación: Un usuario puede estar en muchas conversaciones (grupos o privadas)
    public function conversaciones()
    {
        return $this->belongsToMany(Conversacion::class , 'participantes', 'usuario_id', 'conversacion_id')
            ->withPivot('rol', 'fecha_union');
    }

    // Relación: Mensajes enviados por el usuario
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class , 'usuario_id');
    }

    // Relación: Sus contactos/amigos
    public function contactos()
    {
        return $this->belongsToMany(Usuario::class , 'contactos', 'usuario_id', 'contacto_id');
    }
}
