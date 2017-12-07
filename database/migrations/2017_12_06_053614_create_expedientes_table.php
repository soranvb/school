<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('docente_id')->unsigned()->nullable(); 
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->integer('asignatura_id')->unsigned()->nullable(); 
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');

            $table->integer('grupo_id')->unsigned()->nullable(); 
            $table->foreign('grupo_id')->references('id')->on('grupos');
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
        Schema::dropIfExists('expedientes');
    }
}
