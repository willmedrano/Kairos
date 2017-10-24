<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallerEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_es', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomTallerE');
            $table->string('responsable');
            $table->string('direccionTE');
            $table->string('telefonoTE');
            $table->boolean('estadoTE')->default(true);
            $table->timestamps();
        });

        DB::table('taller_es')->insert(array('nomTallerE'=>'Taller Municipal', 'responsable'=>'Oscar Martinez', 'direccionTE'=>'final 8va avenida sur','telefonoTE'=>'2384-4682','estadoTE'=>'1', 'created_at' => ' 2017-10-24' ,
            'updated_at' => ' 2015-10-24 '));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taller_es');
    }
}
