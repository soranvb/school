<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Docente extends Model
{
	use SoftDeletes;
    protected $table = "docentes";
}
