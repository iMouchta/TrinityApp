<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaTable extends Migration
{
    public function up()
    {
        Schema::create('fecha', function (Blueprint $table) {
            $table->increments('FECHA_ID'); // Define FECHA_ID como la columna autoincremental y clave primaria
            $table->integer('EVENTO_ID')->unsigned(); // No autoincremental, pero puede ser una clave foránea
            $table->string('FECHA_NOMBRE', 255);
            $table->date('FECHA_FECHA');
            $table->timestamps();

            // Definir clave externa
            $table->foreign('EVENTO_ID')
                  ->references('EVENTO_ID')->on('evento')
                  ->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fecha');
    }
}

