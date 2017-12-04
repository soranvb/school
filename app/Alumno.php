<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Alumno extends Model
{
	use SoftDeletes;
    protected $table = "alumnos";

  public function users()
    {
    	return $this->belongsTo(User::class, 'user_id');  //ID DEL DOCENTE NO LA MATRICULA TRAE LOS USUARIOS QUE ESTEN LIGADOS A USER_ID
    	// , 'grupo_id'
    }
     public function grupos()
    {
    	return $this->belongsTo(Grupo::class, 'grupo_id');  //ID DEL DOCENTE NO LA MATRICULA
    	// , 'grupo_id'
    }

      public function asignaturas()
    {
    	return $this->belongsTo(Escuela::class, 'escuela_id');  //ID DEL DOCENTE NO LA MATRICULA
    	// , 'grupo_id'
    }
}
