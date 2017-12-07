<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Asignatura extends Model
{
    use SoftDeletes;
	protected $table = "asignaturas";

     public function grupo()
        {
            return $this->belongsTo(Grupo::class);
        }

         public function users()
    {
    	return $this->belongsTo(User::class, 'docente_id');  //ID DEL DOCENTE NO LA MATRICULA
    	// , 'grupo_id'
    }
   
           public function docentes_asignatura()
        {
            return $this->hasOne(docentes_asignatura::class, 'asignatura_id');
        }
}
