<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome(){

    	 $users=User::where('role',1)->paginate(3);
    	return view('welcome')->with(compact('users'));
    }
}
