<?php

use Illuminate\Database\Seeder;
use App\Grupo;
use App\User;
use App\Asignatura;
class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	Asignatura::create
        ([
        	'name'=>'Español',        	
            'clave'=>('1'), 
            'descripcion'=>'esta es una materia de español',
            'grupo_id'=>('1'),
            'clave_escuela'=>('10'), 
            'docente_id'=>('7'),              
        ]);

        Asignatura::create
        ([
        	'name'=>'Matematicas',        	
            'clave'=>('2'), 
            'descripcion'=>'esta es una materia de materia',
            'grupo_id'=>('1'), 
            'clave_escuela'=>('10'),
            'docente_id'=>('5'),              
        ]);
         Asignatura::create
        ([
        	'name'=>'Biologia',        	
            'clave'=>('3'), 
            'descripcion'=>'esta es una materia de hablar',
            'grupo_id'=>('1'), 
            'clave_escuela'=>('10'),
             'docente_id'=>('6'),              
        ]);
    }
}
