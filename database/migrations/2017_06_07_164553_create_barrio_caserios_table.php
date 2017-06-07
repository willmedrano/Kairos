<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarrioCaseriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrio_caserios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->Integer('idCC')->unsigned();
            $table->foreign('idCC')->references('id')->on('colonia_cantons');
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
        Schema::dropIfExists('barrio_caserios');
    }
}
