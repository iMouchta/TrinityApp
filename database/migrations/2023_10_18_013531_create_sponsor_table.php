<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorTable extends Migration
{
    public function up()
    {
        Schema::create('sponsor', function (Blueprint $table) {
            $table->increments('SPONSOR_ID');
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('SPONSOR_NOMBRE', 1024);
            $table->string('SPONSOR_ENLACE', 1024)->nullable(); 
            $table->string('SPONSOR_LOGO', 1024)->nullable(); 

            $table->unique('SPONSOR_ID', 'SPOSOR_PK');

            $table->foreign('EVENTO_ID', 'FK_PATROCINAN')
            ->references('EVENTO_ID')
            ->on('evento')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsor');
    }
}

