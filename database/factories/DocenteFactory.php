<?php

use Faker\Generator as Faker;
use App\Docente;
use App\Escuela;
use App\User;

$factory->define(Docente::class, function (Faker $faker) {
	$user_ids = App\User::pluck('id');
    return [
        'user_id'=> $user_ids->random(),
        'escuela_id'=>$faker->numberBetween(1,3),
    ];
});
