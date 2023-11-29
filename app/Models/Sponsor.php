<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

    protected $table = 'sponsor';
    protected $primaryKey = 'SPONSOR';
    protected $fillable = ['SPONSOR_NOMBRE', 'SPONSOR_ENLACE', 'SPONSOR_LOGO', 'EVENTO_ID'];

    public function sponsors{
        return $this -> hasMany(Sponsor::class, 'EVENTO_ID');
    }
}
