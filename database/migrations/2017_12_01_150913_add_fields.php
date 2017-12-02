<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos', function($table) {
          $table->integer('clave_escuela')->unsigned()->nullable(); 
             $table->foreign('clave_escuela')->references('clave')->on('users');
        });
    }              

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::table('grupos', function($table) {
           $table->dropForeign(['clave_escuela']);
        });
    }
}
