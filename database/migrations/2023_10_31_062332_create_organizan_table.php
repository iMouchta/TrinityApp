<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizanTable extends Migration
{
    public function up()
    {
        Schema::create('organizan', function (Blueprint $table) {
            $table->integer('ORGANIZADOR_ID')->unsigned();
            $table->integer('EVENTO_ID')->unsigned();
            $table->timestamps();

            // Definir la llave primaria
            $table->primary(['ORGANIZADOR_ID', 'EVENTO_ID']);

            // Definir las claves foráneas
            $table->foreign('ORGANIZADOR_ID')
                ->references('ORGANIZADOR_ID')
                ->on('organizador')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('EVENTO_ID')
                ->references('EVENTO_ID')
                ->on('evento')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizan');
    }
}

