<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->increments('REGISTRO_ID');
            $table->unsignedBigInteger('EVENTO_ID')->nullable();
            $table->string('REGISTRO_ATRIBUTO', 1024);
            $table->foreign('EVENTO_ID')->references('EVENTO_ID')->on('evento')->onDelete('restrict');
            $table->timestamps();
            $table->primary(['REGISTRO_ID', 'EVENTO_ID']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('registro');
    }
}