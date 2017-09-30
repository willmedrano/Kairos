<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_actividads', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->string('nombre_img');
            $table->Integer('idActividad')->unsigned();
            $table->foreign('idActividad')->references('id')->on('actividads');
            $table->string('observacion');
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
        Schema::dropIfExists('detalle_actividads');
    }
}
