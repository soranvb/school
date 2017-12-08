<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcials', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('docentes_asignaturas_id')->unsigned()->nullable();
            $table->foreign('docentes_asignaturas_id')->references('id')->on('docentes_asignaturas');
            
            $table->integer('alumno_id')->unsigned()->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->integer('asignatura_id')->unsigned()->nullable();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');

            $table->integer('uno');
            $table->integer('dos');
            $table->integer('tres');
            $table->integer('cuatro');
            $table->integer('cinco');
            $table->integer('seis');
            $table->float('prom');




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
        Schema::dropIfExists('parcials');
    }
}
