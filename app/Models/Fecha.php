<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fecha';
    protected $fillable = ['FECHA_NOMBRE', 'FECHA_FECHA', 'EVENTO_ID'];

    public $timestamps = false;
    
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}