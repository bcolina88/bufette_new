<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencias', function (Blueprint $table) {
            $table->increments('id');
     
            $table->string('hora');
            $table->string('fecha');
            $table->string('demandado');
            $table->text('senalamiento')->nullable();
            $table->string('localidad');
            $table->text('documentos');
            $table->boolean('notificar');


            $table->integer('idcliente')->unsigned();
            $table->integer('idexpediente')->unsigned();



            
            

            $table->timestamps();

            $table->foreign('idexpediente')->references('id')->on('expedientes')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('idcliente')->references('id')->on('clientes')
            ->onUpdate('cascade')
            ->onDetete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audiencias');
    }
}
