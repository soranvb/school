<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');



            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('docentes');
    }
}
