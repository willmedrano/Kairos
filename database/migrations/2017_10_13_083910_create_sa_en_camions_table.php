<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaEnCamionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sa_en_camions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idAsignacion')->unsigned();
            $table->foreign('idAsignacion')->references('id')->on('asignar_mot_vehs');
            $table->Integer('idVale')->unsigned();
            $table->foreign('idVale')->references('id')->on('vales_combustibles');
            $table->Integer('idCC')->unsigned();
            $table->foreign('idCC')->references('id')->on('colonia_caserios');
            $table->Integer('idUbc')->unsigned();
            $table->foreign('idUbc')->references('id')->on('colonia_caserios');
            $table->string('idActividad');
            $table->date('fecha');
            $table->Double('kilometrajeS');
            $table->Double('kilometrajeE')->default(0.0);
            $table->integer('tanqueS');
            $table->integer('tanqueE')->default(0);
            $table->string('horaSalida');
            $table->string('horaEntrada')->default(0);
            $table->string('observacionS');
            $table->string('observacionE');
            $table->string('tipo');
            $table->String('nViajes');
            $table->string('horaExtra')->default(0);
            $table->boolean('estadoC')->default(false);
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
        Schema::dropIfExists('sa_en_camions');
    }
}
