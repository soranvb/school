<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcial extends Model
{
             public function alumno()
        {
            return $this->hasMany(Alumno::class, 'alumno_id', 'asignatura_id');
        }

}
