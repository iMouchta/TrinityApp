<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaTable extends Migration
{
    public function up()
    {
        Schema::create('fecha', function (Blueprint $table) {
            $table->increments('FECHA_ID'); // Campo ID autoincremental
            $table->integer('EVENTO_ID')->unsigned(); // Campo de evento (puede ser nulo)
            $table->string('FECHA_NOMBRE', 1024);
            $table->date('FECHA_FECHA');
            $table->string('FECHA_DESCRIPCION', 1024)->nullable(); // Campo de descripción (puede ser nulo)
            $table->timestamps();

            // Definir la llave primaria
            $table->unique('FECHA_ID', 'FECHA_PK');

            // Definir la clave foránea
            $table->foreign('EVENTO_ID', 'FK_FECHA_CUENTA_CO_EVENTO')
                ->references('EVENTO_ID')
                ->on('evento')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fecha');
    }
}
