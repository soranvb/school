<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
     public function grupo()
        {
            return $this->belongsTo(Grupo::class);
        }

         public function users()
    {
    	return $this->belongsTo(User::class, 'docente_id');  //ID DEL DOCENTE NO LA MATRICULA
    	// , 'grupo_id'
    }
   
}
