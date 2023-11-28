<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $table = 'requisito';
    protected $fillable = ['REQUISITO_NOMBRE', 'EVENTO_ID'];

    public function evento()
{
    return $this->belongsTo(Evento::class, 'EVENTO_ID', 'EVENTO_ID');
}
}
