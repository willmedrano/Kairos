<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarrioCantonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrio_cantons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('tipo');
            $table->boolean('estadoB')->default(true);
            $table->timestamps();
        });

        DB::table('barrio_cantons')->insert(array('nombre'=>'Salida fuera del municipio', 'tipo'=>'fuera', 'estadoB'=>'0', 'created_at' => ' 2015-09-03 ' ,
            'updated_at' => ' 2015-09-03 '));
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barrio_cantons');
    }
}
