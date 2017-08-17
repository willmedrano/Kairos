<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotoristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motoristas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombresMot');
            $table->string('apellidosMot');
            $table->string('direccionMot');
            $table->string('sexo');
            $table->string('telefonoMot');
            $table->string('DUI');
            $table->string('licencia');
            $table->date('fechaNacimiento');
            $table->date('fechaContrato');
            $table->date('fechaDespido');
            $table->string('nombre_img');
            $table->boolean('estadoMot')->default(true);
            $table->string('tipoMot');
            $table->string('observacionMot');
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
        Schema::dropIfExists('motoristas');
    }
}
