<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenTable extends Migration
{
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->increments('IMAGEN_ID'); // Campo ID autoincremental
            $table->integer('EVENTO_ID')->unsigned(); // Campo de evento (puede ser nulo)
            $table->string('IMAGEN_IMAGEN', 1024); // Campo de imagen (puede ser nulo)
            $table->string('IMAGEN_TIPO', 1024);
            $table->timestamps();

            // Definir la llave primaria
            $table->unique('IMAGEN_ID', 'IMAGEN_PK');

            // Definir la clave foránea
            $table->foreign('EVENTO_ID', 'TIENE_FK')
                ->references('EVENTO_ID')
                ->on('evento')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagen');
    }
}
