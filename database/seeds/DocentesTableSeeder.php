<?php

use Illuminate\Database\Seeder;
use App\Docente;
use App\Escuela;
use App\User;
use App\Grupo;
use App\Docentes_asignatura;
use App\Asignatura;
use App\Alumno;
class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Docente::class,10)->create();
          factory(Asignatura::class,10)->create();
          factory(Grupo::class,10)->create();
          factory(Alumno::class,10)->create();
    }
   
}
