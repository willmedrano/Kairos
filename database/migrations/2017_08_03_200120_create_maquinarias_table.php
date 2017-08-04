<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinarias', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idTipo')->unsigned();
            $table->foreign('idTipo')->references('id')->on('tipo_vmqs');
            $table->Integer('idModelo')->unsigned();
            $table->foreign('idModelo')->references('id')->on('modelos');
            $table->string('color');
            $table->integer('anio');
            $table->string('nEquipo');
            $table->string('nInventario');
            $table->integer('horaM');
            $table->integer('horaAux')->default(0);;
            $table->integer('semaforo')->default(1);
            $table->string('nombre_img');
            $table->integer('estadoMaq')->default(1);
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
        Schema::dropIfExists('maquinarias');
    }
}
