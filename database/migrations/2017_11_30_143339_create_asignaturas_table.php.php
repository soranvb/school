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
            $table->string('clave')->nullable();;
            $table->text('descripcion')->nullable();
            // $table->tinyInteger('estatus')->default(1);
            // $table->integer('grupo_id')->unsigned()->nullable();
            // $table->foreign('grupo_id')->references('id')->on('grupos'); 
            // $table->integer('clave_escuela')->unsigned()->nullable(); 
            // $table->foreign('clave_escuela')->references('clave')->on('users');

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
        Schema::dropIfExists('asignaturas');
    }
}