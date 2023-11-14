<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';
    protected $fillable = ['CONTACTO_NOMBRE', 'CONTACTO_NUMERO', 'CONTACTO_EMAIL','EVENTO_ID'];


}
