<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
            public function grupo()
        {
            return $this->belongsTo(Grupo::class);
        }

          public function asignatura()
        {
            return $this->belongsTo(Asignatura::class);
        }

           public function escuela()
        {
            return $this->hasMany(Escuela::class);
        }

            public function alumno()
        {
            return $this->hasOne(Alumno::class, user_id);
        }
   

}


 // class Users extends Model
 //    {
       
 //    }

