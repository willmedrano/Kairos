<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMecanicoInternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mecanico_internos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombresMec');
            $table->string('apellidosMec');
            $table->string('direccionMec');
            $table->string('sexo');
            $table->string('telefonoMec');
            $table->string('DUI');
            $table->date('fechaNacimiento');
            $table->date('fechaContrato');
            $table->date('fechaDespido');
            $table->string('nombre_img');
            $table->boolean('estadoMec')->default(true);
            $table->string('observacionMec');
            $table->Integer('idTaller')->unsigned();
            $table->foreign('idTaller')->references('id')->on('taller_es');
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
        Schema::dropIfExists('mecanico_internos');
    }
}
