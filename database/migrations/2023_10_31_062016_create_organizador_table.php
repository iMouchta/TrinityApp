<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizadorTable extends Migration
{
    public function up()
    {
        Schema::create('organizador', function (Blueprint $table) {
            $table->increments('ORGANIZADOR_ID'); // Campo ID autoincremental
            $table->string('ORGANIZADOR_NOMBRE', 1024);
            $table->string('ORGANIZADOR_ENLACE', 1024)->nullable(); // Campo de enlace (puede ser nulo)
            $table->string('ORGANIZADOR_LOGO', 1024)->nullable(); // Campo de logo (puede ser nulo)
            $table->timestamps();

            // Definir la llave primaria
            $table->unique('ORGANIZADOR_ID', 'ORGANIZADOR_PK');
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizador');
    }
}
