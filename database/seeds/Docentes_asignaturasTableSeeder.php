<?php
use Illuminate\Database\Seeder;
use App\Docente;
use App\Escuela;
use App\User;
use App\Grupo;
use App\Docentes_asignatura;
use App\Asignatura;
use App\Alumno;

class Docentes_asignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              Docentes_asignatura::create
        ([
            'grupo_id'=>'11',
            'asignatura_id'=>('12'), 
            'docente_id'=>('1'), 
        ]);
              Docentes_asignatura::create
        ([
            'grupo_id'=>'11',
            'asignatura_id'=>('11'), 
            'docente_id'=>('1'), 
        ]);
    }
}
