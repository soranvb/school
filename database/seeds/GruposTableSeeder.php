<?php

use Illuminate\Database\Seeder;
use App\Grupo;
use App\User;
use App\Asignatura;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 Grupo::create
        ([
        	'name'=>('Segundo "A"'),        	
            'clave'=>('14213'),
            'descripcion'=>('hola es un grupo prueba'),
            'escuela_id'=>('2'),            
        ]);

     //    Grupo::create
     //    ([
     //    	'name'=>'2B',        	
     //        'clave'=>('2'), 
     //        'clave_escuela'=>('10'),            
     //    ]);

     //     Grupo::create
     //    ([
     //    	'name'=>'3A ',        	
     //        'clave'=>('3'), 
     //        'clave_escuela'=>('10'),            
        // ]);


        // factory(User::class,200)->create();

    }
}
