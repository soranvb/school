<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name');          
            $table->text('descripcion')->nullable();
            $table->integer('clave')->nullable();
            $table->integer('escuela_id')->unsigned()->nullable();
            $table->foreign('escuela_id')->references('id')->on('escuelas');
             $table->softDeletes(); 
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
        Schema::dropIfExists('grupos');
    }
}
