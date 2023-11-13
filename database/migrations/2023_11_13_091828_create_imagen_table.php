<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenTable extends Migration
{
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->increments('IMAGEN_ID');
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('IMAGEN_IMAGEN', 1024);
            $table->string('IMAGEN_TIPO', 1024);
            $table->timestamps();

            $table->unique('IMAGEN_ID', 'IMAGEN_PK');

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
