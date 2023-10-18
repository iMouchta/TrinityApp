<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorTable extends Migration
{
    public function up()
    {
        Schema::create('sponsor', function (Blueprint $table) {
            $table->integer('SPONSOR_ID')->unsigned();
            $table->string('SPONSOR_NOMBRE', 255);
            $table->string('SPONSOR_ENLACE', 1024)->nullable();
            $table->string('SPONSOR_LOGO', 1024)->nullable();

            // Definir la clave primaria y la clave única
            $table->primary(['SPONSOR_ID', 'SPONSOR_NOMBRE']);
            $table->unique(['SPONSOR_ID', 'SPONSOR_NOMBRE'], 'SPONSOR_PK');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsor');
    }
}