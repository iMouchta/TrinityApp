<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['EVENTO_NOMBRE', 'EVENTO_TIPO', 'EVENTO_DESCRIPCION', 'EVENTO_MODALIDAD', 'EVENTO_NOTIFICACIONES', 'EVENTO_USUARIOS', 'EVENTO_DIRECCION', 'EVENTO_REQUISITOS', 'EVENTO_COSTO', 'EVENTO_BASE'];
    public $timestamps = false;

    public function fechas()
    {
        return $this->hasMany(Fecha::class);
    }
}