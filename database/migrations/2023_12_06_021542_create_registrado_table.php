<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistradoTable extends Migration
{
    public function up()
    {

            Schema::create('registrado', function (Blueprint $table) {
                $table->increments('REGISTRADO_ID');
                $table->string('REGISTRADO_ATRIBUTO', 1024);
                $table->string('REGISTRADO_VALOR', 1024);
                $table->foreign('REGISTRADO_ID')->references('REGISTRADO_ID')->on('registro')->onDelete('restrict');
                $table->timestamps();

    
            });
    }
    
        public function down()
        {
            Schema::dropIfExists('registrado');
        }
}
