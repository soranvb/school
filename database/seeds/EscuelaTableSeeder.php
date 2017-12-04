<?php

use Illuminate\Database\Seeder;
use App\Escuela;
use App\Asignatura;

class EscuelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::create
        ([
        	
            'user_id'=>3,

        ]);

        Escuela::create
        ([
            
            'user_id'=>4,
        ]);

        Escuela::create
        ([
     
            'user_id'=>2,
        ]);          

    }
}
