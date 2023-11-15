<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagen';
    protected $primaryKey = 'IMAGEN_ID';
    protected $fillable = ['IMAGEN_IMAGEN', 'IMAGEN_TIPO', 'EVENTO_ID'];

}
