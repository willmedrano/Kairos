<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignarMotMaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar_mot_maqs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idMotorista')->unsigned();
            $table->foreign('idMotorista')->references('id')->on('motoristas');
            $table->Integer('idMaquinaria')->unsigned();
            $table->foreign('idMaquinaria')->references('id')->on('maquinarias');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->boolean('estadoAsignacionMaq')->default(true);
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
        Schema::dropIfExists('asignar_mot_maqs');
    }
}
