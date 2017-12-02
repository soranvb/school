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
            'clave'=>('0'),
        	'role'=>0,
        ]);

        User::create
        ([
            'name'=>'Cobaes',
            'email'=>'cobaes@hotmail.com',
            'password'=> bcrypt('asdqwe123'),            
            'clave'=>('10'),
            'role'=>1,
        ]);

        User::create
        ([
            'name'=>'UAS',
            'email'=>'uas@hotmail.com',
            'password'=> bcrypt('asdqwe123'),           
            'clave'=>('5'),
            'role'=>1,
        ]);

        User::create
        ([
            'name'=>'ITC',
            'email'=>'itc@hotmail.com',
            'password'=> bcrypt('asdqwe123'),           
            'clave'=>('3'),
            'role'=>1,
        ]);

        

    }
}
