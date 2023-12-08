<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaTable extends Migration
{
    public function up()
    {
        Schema::create('fecha', function (Blueprint $table) {
            $table->increments('FECHA_ID'); 
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('FECHA_NOMBRE', 1024);
            $table->datetime('FECHA_INICIO');
            $table->datetime('FECHA_FINAL');
            $table->string('FECHA_DESCRIPCION', 1024)->nullable();            

            $table->unique('FECHA_ID', 'FECHA_PK');

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
