<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrociniosTable extends Migration
{
    public function up()
    {
        Schema::create('patrocinios', function (Blueprint $table) {
            $table->integer('SPONSOR_ID')->unsigned();
            $table->string('SPONSOR_NOMBRE', 255);
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('EVENTO_NOMBRE', 255);

            // Definir las relaciones de clave foránea
            $table->foreign(['EVENTO_ID', 'EVENTO_NOMBRE'], 'FK_PATROCIN_RELATIONS_EVENTO')
                  ->references(['EVENTO_ID', 'EVENTO_NOMBRE'])
                  ->on('evento')
                  ->onDelete('RESTRICT')
                  ->onUpdate('RESTRICT');

            $table->foreign(['SPONSOR_ID', 'SPONSOR_NOMBRE'], 'FK_PATROCIN_RELATIONS_SPONSOR')
                  ->references(['SPONSOR_ID', 'SPONSOR_NOMBRE'])
                  ->on('sponsor')
                  ->onDelete('RESTRICT')
                  ->onUpdate('RESTRICT');

            // Definir la clave primaria con un nombre más corto
            $table->primary(['SPONSOR_ID', 'SPONSOR_NOMBRE', 'EVENTO_ID', 'EVENTO_NOMBRE'], 'patrocinios_primary');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patrocinios');
    }
}
