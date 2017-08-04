<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignarMotVehsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar_mot_vehs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idMotorista')->unsigned();
            $table->foreign('idMotorista')->references('id')->on('motoristas');
            $table->Integer('idVehiculo')->unsigned();
            $table->foreign('idVehiculo')->references('id')->on('vehiculos');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->boolean('estadoAsignacion')->default(true);
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
        Schema::dropIfExists('asignar_mot_vehs');
    }
}
