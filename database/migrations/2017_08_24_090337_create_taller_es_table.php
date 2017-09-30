<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallerEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_es', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomTallerE');
            $table->string('responsable');
            $table->string('direccionTE');
            $table->string('telefonoTE');
            $table->boolean('estadoTE')->default(true);
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
        Schema::dropIfExists('taller_es');
    }
}
