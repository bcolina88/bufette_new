<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->text('motivo');
            $table->string('prioridad');
            $table->boolean('notificar');
            

            $table->integer('cliente_id')->unsigned();
            $table->integer('encargado_id')->unsigned();
            $table->integer('caso_id')->unsigned();

            $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('encargado_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('caso_id')->references('id')->on('casos')
            ->onUpdate('cascade')
            ->onDetete('cascade');



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
        Schema::dropIfExists('citas');
    }
}
