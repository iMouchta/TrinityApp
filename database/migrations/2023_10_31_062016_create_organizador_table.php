<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizadorTable extends Migration
{
    public function up()
    {
        Schema::create('organizador', function (Blueprint $table) {
            $table->increments('ORGANIZADOR_ID');
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('ORGANIZADOR_NOMBRE', 1024);
            $table->string('ORGANIZADOR_ENLACE', 1024)->nullable(); 
            $table->string('ORGANIZADOR_LOGO', 1024)->nullable(); 

            $table->unique('ORGANIZADOR_ID', 'ORGANIZADOR_PK');

            $table->foreign('EVENTO_ID', 'FK_ORGANIZAN')
            ->references('EVENTO_ID')
            ->on('evento')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizador');
    }
}
