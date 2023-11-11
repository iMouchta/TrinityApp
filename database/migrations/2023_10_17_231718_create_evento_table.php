<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('EVENTO_ID'); 
            $table->string('EVENTO_NOMBRE', 1024);
            $table->string('EVENTO_TIPO', 1024);
            $table->mediumText('EVENTO_DESCRIPCION');
            $table->string('EVENTO_MODALIDAD', 1024);
            $table->smallInteger('EVENTO_NOTIFICACIONES');
            $table->smallInteger('EVENTO_USUARIOS');
            $table->string('EVENTO_UBICACION', 1024)->nullable();
            $table->float('EVENTO_COSTO')->nullable();
            $table->mediumText('EVENTO_BASES')->nullable();
            $table->timestamps();

            $table->unique('EVENTO_ID', 'EVENTO_PK');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evento');
    }
}

