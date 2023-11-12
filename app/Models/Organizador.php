<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{

    protected $table = 'organizador';
    protected $fillable = ['ORGANIZADOR_NOMBRE', 'ORGANIZADOR_ENLACE', 'ORGANIZADOR_LOGO'];

}