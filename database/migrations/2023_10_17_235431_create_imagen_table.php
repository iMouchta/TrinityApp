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
            $table->STRING('IMAGEN_IMAGEN',1024);
            $table->timestamps();

            // Definir clave foránea
            $table->foreign('EVENTO_ID')
                  ->references('EVENTO_ID')->on('evento')
                  ->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagen');
    }
}