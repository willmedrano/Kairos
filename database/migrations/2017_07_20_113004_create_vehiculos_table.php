<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idTipo')->unsigned();
            $table->foreign('idTipo')->references('id')->on('tipo_vmqs');
            $table->Integer('idModelo')->unsigned();
            $table->foreign('idModelo')->references('id')->on('modelos');
            $table->string('color');
            $table->integer('anio');
            $table->string('nPlaca');
            $table->string('nInventario');
            $table->double('kilometraje');
            $table->double('kilometrajeAux')->default(0.0);
            $table->double('kilometrajeM');
            $table->string('nombre_img');
            $table->integer('semaforo')->default(1);
            $table->integer('estadoVeh')->default(1);
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
        Schema::dropIfExists('vehiculos');
    }
}
