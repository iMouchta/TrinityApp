<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $primaryKey = 'FECHA_ID';
    protected $table = 'fecha';
    protected $fillable = ['FECHA_NOMBRE', 'FECHA_INICIO', 'FECHA_FINAL', 'FECHA_DESCRIPCION','EVENTO_ID'];
    public $timestamps = false;

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}