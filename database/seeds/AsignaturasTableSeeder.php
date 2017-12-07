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
              'escuela_id'=>('2'),
                          
        ]);

        Asignatura::create
        ([
            'name'=>'Matematicas',          
             'clave'=>('6'), 
             'descripcion'=>'esta es una materia de mate',
              'escuela_id'=>('2'),
                          
        ]);
        //  Asignatura::create
        // ([
        // 	'name'=>'Biologia',        	
        //     'clave'=>('3'), 
        //     'descripcion'=>'esta es una materia de hablar',
        //     // 'grupo_id'=>('1'), 
        //     'clave_escuela'=>('10'),
                           
        // ]);
    }
}
