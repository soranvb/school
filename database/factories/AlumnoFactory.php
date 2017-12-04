<?php

use Faker\Generator as Faker;
use App\Docente;
use App\Escuela;
use App\User;
use App\Grupo;
use App\Docentes_asignatura;
use App\Asignatura;
use App\Alumno;

$factory->define(Alumno::class, function (Faker $faker) {
    $escuelas_ids = App\Escuela::pluck('id');
    $grupos_ids= App\Grupo::pluck('id');
    $users_ids= App\User::pluck('id');
    return [         
       
        'escuela_id'=> $escuelas_ids->random(),
        'user_id'=> $users_ids->random(),
        'clave' => $faker->numberBetween(1,1000000),
        'grupo_id' => $grupos_ids->random(),
        ];
});
