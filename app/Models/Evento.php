<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'EVENTO_ID';
    protected $fillable = ['EVENTO_NOMBRE', 'EVENTO_TIPO', 'EVENTO_COSTO', 'EVENTO_DESCRIPCION', 'EVENTO_MODALIDAD', 'EVENTO_USUARIOS', 'EVENTO_UBICACION', 'EVENTO_REQUISITOS', 'EVENTO_BASES', 'EVENTO_NOTIFICACIONES', 'EVENTO_USUARIOS'];

    public $timestamps = false;

    public function fechas()
    {
        return $this->hasMany(Fecha::class, 'EVENTO_ID', 'EVENTO_ID');
    }

    public function requisitos()
    {
        return $this->hasMany(Requisito::class, 'EVENTO_ID', 'EVENTO_ID');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'EVENTO_ID', 'EVENTO_ID');
    }

}
