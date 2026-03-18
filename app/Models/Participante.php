<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Participante extends Pivot
{
    protected $table = 'participantes';
    public $timestamps = false;
    protected $fillable = ['conversacion_id', 'usuario_id', 'rol', 'fecha_union'];
}