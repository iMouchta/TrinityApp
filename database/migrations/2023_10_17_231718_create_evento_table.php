<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('EVENTO_NOMBRE', 255);
            $table->string('EVENTO_TIPO', 255);
            $table->float('EVENTO_COSTO')->nullable();
            $table->timestamps();


            // Definir la clave primaria compuesta
            $table->primary(['EVENTO_ID', 'EVENTO_NOMBRE']);
            $table->unique(['EVENTO_ID', 'EVENTO_NOMBRE'], 'EVENTO_PK');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evento');
    }
}
