<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrganizadoresEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor', function (Blueprint $table) {
            $table->increments('SPONSOR_ID'); 
            $table->string('SPONSOR_NOMBRE', 1024);
            $table->string('SPONSOR_ENLACE', 1024)->nullable(); 
            $table->string('SPONSOR_LOGO', 1024)->nullable(); 
            $table->timestamps();

            $table->unique('SPONSOR_ID', 'SPOSOR_PK');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
