<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('clave');
            $table->text('descripcion')->nullable();
            $table->tinyInteger('estatus')->default(1);

            $table->integer('grupo_id')->unsigned()->nullable();
            $table->foreign('grupo_id')->references('id')->on('grupos'); 

            $table->integer('docente_id')->unsigned()->nullable(); 
            $table->foreign('docente_id')->references('id')->on('users');


            $table->integer('clave_escuela')->unsigned()->nullable(); 
            $table->foreign('clave_escuela')->references('clave')->on('users');




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
        Schema::dropIfExists('asignaturas');
    }
}
