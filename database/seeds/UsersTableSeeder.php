<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        ([
        	'name'=>'Administrador',
        	'email'=>'admin@hotmail.com',
        	'password'=> bcrypt('asdqwe123'),       	
        	'role'=>0,
            'clave'=>50232,

        ]);

        User::create
        ([
            'name'=>'Cobaes',
            'email'=>'cobaes@hotmail.com',
            'password'=> bcrypt('asdqwe123'),            
            'role'=>1,
            'clave'=>5564743,
        ]);

        User::create
        ([
            'name'=>'UAS',
            'email'=>'uas@hotmail.com',
            'password'=> bcrypt('asdqwe123'),           
            'role'=>1,
            'clave'=>123424,
        ]);

        User::create
        ([
            'name'=>'ITC',
            'email'=>'itc@hotmail.com',
            'password'=> bcrypt('asdqwe123'),  
            'role'=>1,
            'clave'=>23213,
        ]);

        User::create
        ([
            'name'=>'Santi',
            'email'=>'santi@hotmail.com',
            'password'=> bcrypt('asdqwe123'),  
            'role'=>2,
            'clave'=>12345694,
        ]);

        factory(User::class,50)->create();       

    }
}
