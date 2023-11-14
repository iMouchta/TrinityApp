<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrocinioTable extends Migration
{
    public function up()
    {
        Schema::create('patrocinio', function (Blueprint $table) {
            $table->integer('SPONSOR_ID')->unsigned();
            $table->integer('EVENTO_ID')->unsigned();
            $table->timestamps();

            $table->primary(['SPONSOR_ID', 'EVENTO_ID']);

            $table->foreign('SPONSOR_ID')
                ->references('SPONSOR_ID')
                ->on('sponsor')
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
        Schema::dropIfExists('patrocinio');
    }
}
