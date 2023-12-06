<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegformTable extends Migration
{
    public function up()
    {
        Schema::create('regform', function (Blueprint $table) {
            $table->increments('REGFORM_ID');
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('REGFORM_NOMBRE', 1024);
            $table->string('REGFORM_TIPO',1024);
            $table->string('REGFORM_CONFIGURACION',1024); //Obligatorio, Opcional
            $table->timestamps();

            $table->unique('REGFORM_ID', 'REGFORM_PK');

            $table->foreign('EVENTO_ID', 'FK_ES_NECESARIO_PARA_REGISTROS')
                ->references('EVENTO_ID')
                ->on('evento')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('regform');
    }
}
