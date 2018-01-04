<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateSaEnMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sa_en_maquinarias', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idAsignacion')->unsigned();
            $table->foreign('idAsignacion')->references('id')->on('asignar_mot_maqs');
            $table->Integer('idVale')->unsigned();
            $table->foreign('idVale')->references('id')->on('vales_combustibles');
            $table->Integer('idActividad')->unsigned();
            $table->foreign('idActividad')->references('id')->on('actividads');
            $table->Integer('idUbc')->unsigned();
            $table->foreign('idUbc')->references('id')->on('colonia_caserios');
            $table->Integer('idUbc2')->unsigned();
            $table->foreign('idUbc2')->references('id')->on('colonia_caserios');
            $table->date('fecha');
            $table->Integer('horasM');
            $table->integer('tanqueS');
            $table->integer('tanqueE')->default(0);
            $table->string('horaSalida');
            $table->string('horaEntrada')->default(0);
            $table->string('observacionS');
            $table->string('observacionE');
            $table->string('longitud')->default(0);
            $table->string('horaExtra')->default(0);
            $table->boolean('estado')->default(false);

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
        Schema::dropIfExists('sa_en_maquinarias');
    }
}
