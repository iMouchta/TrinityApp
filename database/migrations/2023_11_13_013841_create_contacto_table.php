<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration
{
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->increments('CONTACTO_ID');
            $table->integer('EVENTO_ID')->unsigned();
            $table->string('CONTACTO_NOMBRE', 1024);
            $table->string('CONTACTO_NUMERO', 50);
            $table->string('CONTACTO_EMAIL', 1024);
   
            $table->unique('CONTACTO_ID', 'CONTACTO_PK');

            $table->foreign('EVENTO_ID', 'SE_INFORMA_POR_FK')
                ->references('EVENTO_ID')
                ->on('evento')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacto');
    }
}
