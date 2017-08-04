<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoniaCaseriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colonia_caserios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->Integer('idCC')->unsigned();
            $table->foreign('idCC')->references('id')->on('barrio_cantons');
            $table->string('nombre_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colonia_caserios');
    }
}
