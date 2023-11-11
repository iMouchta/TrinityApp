<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitoTable extends Migration
{
    public function up()
    {
        Schema::create('requisito', function (Blueprint $table) {
            $table->increments('REQUISITO_ID'); 
            $table->integer('EVENTO_ID')->unsigned(); 
            $table->string('REQUISITO_NOMBRE', 1024);
            $table->timestamps();

                      $table->unique('REQUISITO_ID', 'FECHA_PK');

            $table->foreign('EVENTO_ID', 'FK_REQUISITO_CUENTA_CO_EVENTO')
                ->references('EVENTO_ID')
                ->on('evento')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisito');
    }
}
