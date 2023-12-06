<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $primaryKey = 'FECHA_ID';
    protected $table = 'fecha';
    protected $fillable = ['FECHA_NOMBRE', 'FECHA_FECHA', 'FECHA_DESCRIPCION','EVENTO_ID'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}