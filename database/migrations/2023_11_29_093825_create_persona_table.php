<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('PERSONA_ID'); 
            $table->string('PERSONA_CORREO', 1024);

            $table->unique('PERSONA_ID', 'PERSONA_PK');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persona');
    }
}


