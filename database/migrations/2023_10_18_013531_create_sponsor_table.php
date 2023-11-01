<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorTable extends Migration
{
    public function up()
    {
        Schema::create('sponsor', function (Blueprint $table) {
            $table->increments('SPONSOR_ID'); // Campo ID autoincremental
            $table->string('SPONSOR_NOMBRE', 1024);
            $table->string('SPONSOR_ENLACE', 1024)->nullable(); // Campo de enlace (puede ser nulo)
            $table->string('SPONSOR_LOGO', 1024)->nullable(); // Campo de logo (puede ser nulo)
            $table->timestamps();

            // Definir la llave primaria
            $table->unique('SPONSOR_ID', 'SPOSOR_PK');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsor');
    }
}

