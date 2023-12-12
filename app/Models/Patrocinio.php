<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Patrocinio extends Model
{

   // protected $primaryKey = 'SPONSOR_ID';
    protected $table = 'patrocinio';
    protected $fillable = ['EVENTO_ID', 'SPONSOR_ID'];

}