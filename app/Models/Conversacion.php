<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversacion extends Model
{
    protected $table = 'conversaciones';
    protected $fillable = ['nombre', 'imagen', 'descripcion', 'es_grupo', 'creador_id'];

    // Relación: Usuarios que participan en este chat
    public function participantes()
    {
        return $this->belongsToMany(Usuario::class , 'participantes', 'conversacion_id', 'usuario_id')
            ->withPivot('rol', 'fecha_union');
    }

    // Relación: Todos los mensajes de este chat
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class , 'conversacion_id')->orderBy('fecha_y_hora', 'asc');
    }
}