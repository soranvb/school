<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
          
            
            $table->string('clave')->nullable();  
            $table->smallInteger('role'); // 0=Admin 1=Super_Usuario 2=Maestro 3=Alumno          
            // $table->integer('clave')->unsigned()->unique()->nullable(); //clave de la escuela unica
            // $table->integer('clave_escuela')->unsigned()->nullable(); // clave del docente/alumno ligado a la escuela
            // $table->integer('matricula')->unsigned()->nullable(); //clave del alumno o docente
            $table->string('avatar')->default('default.jpg'); 
            // $table->tinyInteger('estatus')->default(1);
            $table->string('email');
            $table->string('password');
            $table->softDeletes();                                                   
            $table->rememberToken();

           

            // $table->foreign('grupo_id')
            // ->references('id')->on('grupos')
            // ->onDelete('cascade');

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
        Schema::dropIfExists('users');
    }
}
