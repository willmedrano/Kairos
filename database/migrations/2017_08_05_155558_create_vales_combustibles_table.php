<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValesCombustiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vales_combustibles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nVale')->default(0);
            $table->string('tipo')->default("Diesel");
            $table->Double('galones')->default(0.0);
            $table->Double('PrecioU')->default(0.0);
            $table->Double('total')->default(0.0);
            $table->boolean('estadoVale')->default(false);
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
        Schema::dropIfExists('vales_combustibles');
    }
}
