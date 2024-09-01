<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TareasModel extends Model
{
    protected $table = 'tareas';
    protected $fillable = ['titulo', 'descripcion', 'estado', 'fecha', 'usuario_asignado_id', 'creado_por'];
}
