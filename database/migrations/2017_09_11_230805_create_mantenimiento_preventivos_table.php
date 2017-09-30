<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientoPreventivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_preventivos', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idMecanico')->unsigned();
            $table->foreign('idMecanico')->references('id')->on('mecanico_internos');
            $table->Integer('idVehiculo')->unsigned();
            $table->foreign('idVehiculo')->references('id')->on('vehiculos');
            $table->string('numTrabajo');
            $table->date('fechaInicioMtt');
            $table->date('fechaFinMtt');
            $table->string('observacionInicioMtt');
            $table->string('observacionFinalMtt');
            $table->Integer('estadoMtt')->default(true);
            $table->Double('gastoMP')->default(0.00);
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
        Schema::dropIfExists('mantenimiento_preventivos');
    }
}
