<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientoPreMaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_pre_maqs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idMecanico')->unsigned();
            $table->foreign('idMecanico')->references('id')->on('mecanico_internos');
            $table->Integer('idMaquinaria')->unsigned();
            $table->foreign('idMaquinaria')->references('id')->on('maquinarias');
            $table->string('numTrabajo');
            $table->date('fechaInicioMtt');
            $table->date('fechaFinMtt');
            $table->string('observacionInicioMtt');
            $table->string('observacionFinalMtt');
            $table->Integer('estadoMtt')->default(true);
            $table->Double('gastoMPM')->default(0.00);
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
        Schema::dropIfExists('mantenimiento_pre_maqs');
    }
}
