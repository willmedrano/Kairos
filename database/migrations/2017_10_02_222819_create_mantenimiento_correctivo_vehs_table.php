<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientoCorrectivoVehsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_correctivo_vehs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idTaller')->unsigned();
            $table->foreign('idTaller')->references('id')->on('taller_es');
            $table->Integer('idVehiculo')->unsigned();
            $table->foreign('idVehiculo')->references('id')->on('vehiculos');
            $table->Integer('idMotorista')->unsigned();
            $table->foreign('idMotorista')->references('id')->on('motoristas');
            $table->string('numTrabajo');
            $table->date('fechaInicioMtt');
            $table->date('fechaFinMtt');
            $table->string('fallasVeh');
            $table->string('diagnosticoMec');
            $table->Integer('estadoMttC')->default(true);
            $table->Double('gastoMC')->default(0.00);
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
        Schema::dropIfExists('mantenimiento_correctivo_vehs');
    }
}
