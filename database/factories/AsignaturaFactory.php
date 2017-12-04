<?php

use Faker\Generator as Faker;
use App\Docente;
use App\Escuela;
use App\User;
use App\Grupo;
use App\Docentes_asignatura;
use App\Asignatura;
use App\Alumno;


$factory->define(Asignatura::class, function (Faker $faker) {
	$escuelas_ids = App\Escuela::pluck('id');
    return [         
        'name' => $faker->name,
        'escuela_id'=> $escuelas_ids->random(),
        'clave' => $faker->numberBetween(1,1000000),
        'descripcion' => $faker->sentence(10),
        ];
});
