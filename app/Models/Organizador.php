<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{

    protected $table = 'organizador';
    protected $primaryKey = 'ORGANIZADOR_ID';
    protected $fillable = ['ORGANIZADOR_NOMBRE', 'ORGANIZADOR_ENLACE', 'ORGANIZADOR_LOGO', 'EVENTO_ID'];

    public function organizadores(){
        return $this -> hasMany(Organizador::class, 'EVENTO_ID');
    }
}

