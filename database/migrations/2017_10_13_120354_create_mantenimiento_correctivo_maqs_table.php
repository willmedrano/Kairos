<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientoCorrectivoMaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_correctivo_maqs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idMecanico')->unsigned();
            $table->foreign('idMecanico')->references('id')->on('mecanico_internos');
            $table->Integer('idMaquinaria')->unsigned();
            $table->foreign('idMaquinaria')->references('id')->on('maquinarias');
            $table->Integer('idMotorista')->unsigned();
            $table->foreign('idMotorista')->references('id')->on('motoristas');
            $table->string('numTrabajo');
            $table->date('fechaInicioMtt');
            $table->date('fechaFinMtt');
            $table->string('fallasMaq');
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
        Schema::dropIfExists('mantenimiento_correctivo_maqs');
    }
}
