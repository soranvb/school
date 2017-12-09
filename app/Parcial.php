<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcial extends Model
{

			use SoftDeletes;
             public function alumno()
        {
            return $this->hasMany(Alumno::class, 'alumno_id', 'asignatura_id');
        }

}
