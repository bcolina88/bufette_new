<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proceso');
            $table->string('tipo_proceso');
            $table->string('estado');
            $table->string('posicion_cliente');
            $table->string('tipo_pago');
            $table->string('tarifa');
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->integer('idexpediente')->unsigned();
            $table->integer('idabogado')->unsigned();
            $table->integer('idcliente')->unsigned();
            $table->text('documentos');


            $table->timestamps();

            $table->foreign('idexpediente')->references('id')->on('expedientes')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('idabogado')->references('id')->on('users')
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
        Schema::dropIfExists('casos');
    }
}
