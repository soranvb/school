<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function user()
    {
    	return $this->hasMany(User::class);  
    	// , 'grupo_id'
    }

     public function asignatura()
    {
    	return $this->hasMany(Asignatura::class);  
    	
    }
}
