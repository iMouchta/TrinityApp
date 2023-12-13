<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

    protected $table = 'sponsor';
    protected $primaryKey = 'SPONSOR';
    protected $fillable = ['SPONSOR_NOMBRE', 'SPONSOR_ENLACE', 'SPONSOR_LOGO', 'EVENTO_ID'];
    public $timestamps = false;

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_organizador', 'organizador_id', 'evento_id');
    }
}
