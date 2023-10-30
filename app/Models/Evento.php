<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $fillable = ['EVENTO_NOMBRE', 'EVENTO_TIPO', 'EVENTO_COSTO'];

    public $timestamps = false;

    public function fechas()
    {
        return $this->hasMany(Fecha::class);
    }
}