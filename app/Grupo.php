<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;
    protected $table = "grupos";

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
