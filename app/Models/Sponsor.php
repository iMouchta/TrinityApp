<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

    protected $table = 'sponsor';
    protected $fillable = ['SPONSOR_NOMBRE', 'SPONSOR_ENLACE', 'SPONSOR_LOGO'];

    // public function eventos()
    // {
    //     return $this->belongsToMany(Evento::class, 'patrocinio', 'SPONSOR_ID', 'EVENTO_ID');
    // }
}