<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docentes_asignatura extends Model
{
    use SoftDeletes;
    protected $table = "docentes_asignaturas";

 public function grupo()
    {
    return $this->belongsTo(Grupo::class, 'grupo_id');  //ID DEL DOCENTE NO LA MATRICULA
    	// , 'grupo_id'
	}

	public function asignatura()
    {
    return $this->belongsTo(asignatura::class, 'asignatura_id');  //ID DEL DOCENTE NO LA MATRICULA
    	// , 'grupo_id'
	}
}
