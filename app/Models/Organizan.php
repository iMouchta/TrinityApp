<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Organizan extends Model
{

    //protected $primaryKey = 'ORGANIZADOR_ID';
    protected $table = 'organizan';
    protected $fillable = ['EVENTO_ID','ORGANIZADOR_ID'];

}