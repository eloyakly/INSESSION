<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $table = 'musica';
    protected $fillable = ['nombre', 'cantante', 'ruta_archivo', 'subido_por'];

    public function autor()
    {
        return $this->belongsTo(Usuario::class , 'subido_por');
    }
}