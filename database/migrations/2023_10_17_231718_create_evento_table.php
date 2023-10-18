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
            $table->mediumText('EVENTO_DESCRIPCION');
            $table->string('EVENTO_MODALIDAD', 255);
            $table->smallInteger('EVENTO_NOTIFICACIONES');
            $table->smallInteger('EVENTO_USUARIOS');
            $table->string('EVENTO_DIRECCION', 1024)->nullable();
            $table->mediumText('EVENTO_REQUISITOS')->nullable();
            $table->float('EVENTO_COSTO')->nullable();
            $table->mediumText('EVENTO_BASE')->nullable();

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