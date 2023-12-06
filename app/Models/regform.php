<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regform extends Model
{
    protected $table = 'regform';
    protected $primaryKey = 'REGFORM_ID';
    protected $fillable = ['REGFORM_NOMBRE', 'REGFORM_TIPO','REGFORM_CONFIGURACION', 'EVENTO_ID'];

    public function evento(){
        return $this->belongsTo(regform::class, 'EVENTO_ID', 'EVENTO_ID');

    }
}
