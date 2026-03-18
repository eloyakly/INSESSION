<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';
    public $timestamps = false; // Usamos el campo fecha_y_hora manual
    protected $fillable = ['conversacion_id', 'usuario_id', 'contenido', 'tipo'];

    // Relación: El usuario que envió el mensaje
    public function usuario()
    {
        return $this->belongsTo(Usuario::class , 'usuario_id');
    }

    // Relación: La conversación a la que pertenece
    public function conversacion()
    {
        return $this->belongsTo(Conversacion::class , 'conversacion_id');
    }
}