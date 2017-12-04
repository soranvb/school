<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grupo;
use App\Escuela;
use App\Asignatura;
use App\docentes_asignaturas;
use Auth;
use DB;
use App\Alumno;

class AlumnoController extends Controller
{
	 public function index()
    {
    	$id=auth()->user()->id;
        $escuela=Escuela::where('user_id',$id)->first();   	
    	$alumnos=Alumno::where('escuela_id',$escuela->id)
        // ->join('users', 'users.id', '=', 'user_id' )
        // ->select('alumnos.*','alumnos.name AS alumnoname')
        ->paginate(10); 

         // dd($alumnos);         
   		return view('escuela.alumnos.index')->with(compact('alumnos')); //listado de  alumnos
     }

      public function create()
    {    
         $id=auth()->user()->id;
         $escuela=Escuela::where('user_id',$id)->first();       
         $grupos=Grupo::where('escuela_id',$escuela->id)->OrderBy('name')->get();
         // dd($grupos); 
    	return view('escuela.alumnos.create')->with(compact('grupos')); // formulario registro alumnos
    }

    public function store(Request $request)
    {

        $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
            'clave'=>'required',              
            'password_confirmation' => 'required|min:8|same:password',
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                'name.max'=>'El nombre es demasiado extenso',
                'email.requiered'=>'Es necesario ingresar email',
                'email.max'=>'Este email es demasiado extenso',
                'email.unique'=>'El email ya se encuentra en uso',
                'password.requiered'=>'Olvido ingresar una contraseña',
                'password.min'=>'La contraseña debe tener por lo menos 8 carracteres',
                'clave.required'=>'Es necesario ingresar una clave',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'password_confirmation.min' => 'La contraseña debe tener por lo menos 8 carracteres',
            ];



        $this->validate($request,$rules, $messages);

        $id=auth()->user()->id;
        $escuela=Escuela::where('user_id',$id)->first();

    	$user= new User();
    	$user->name = $request->input('name');    	
    	$user->email=$request->input('email'); 	                                                            
    	$user->role=3;
        $user->password= bcrypt($request->input('password')); 
        $user->save();

        $alumno= new Alumno();
        $alumno->clave=$request->input('clave');
        $alumno->escuela_id=$escuela->id;
        $alumno->user_id=$user->id;
        $alumno->grupo_id = $request->grupo_id == 0 ? null : $request->grupo_id;
        $alumno->save();       


        return redirect('escuela/alumnos')->with('notification', 'alumno registrado exitosamente.');
	}

	  public function edit($id)
    {
          $alumno=Alumno::find($id);
          $user=User::where('id',$alumno->user_id)->first();
          $escuela=Escuela::where('user_id',$id)->first();       
          $grupos=Grupo::where('escuela_id',$alumno->escuela_id)->OrderBy('name')->get();
        return view('escuela.alumnos.edit')->with(compact('alumno', 'grupos','user')); // formulario de edicion
    }

    public function update(Request $request, $id)
    {

          $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',             
            'password_confirmation' => 'same:password',
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                'name.max'=>'El nombre es demasiado extenso',
                'email.requiered'=>'Es necesario ingresar email',
                'email.max'=>'Este email es demasiado extenso',
                'email.unique'=>'El email ya se encuentra en uso',
                'password.requiered'=>'Olvido ingresar una contraseña',
                'password.min'=>'La contraseña debe tener por lo menos 8 carracteres',
                'matricula.required'=>'Es necesario ingresar una clave',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'password_confirmation.min' => 'La contraseña debe tener por lo menos 8 carracteres',
            ];


        $this->validate($request,$rules, $messages);


        //registrar en la BD
        // dd($request->all());
        $alumno=Alumno::find($id);
        $user=User::where('id',$alumno->user_id)->first();  
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $password=$request->input('password');
        if($password)
            $user->password=bcrypt($password);        
        $user->save();  //update

        $alumno->clave=$request->input('clave');
        $alumno->grupo_id = $request->grupo_id == 0 ? null : $request->grupo_id;
        $alumno->save();
        return redirect('escuela/alumnos')->with('notification', 'alumno modificado exitosamente');
    }

      public function destroy($id)
    {   
        $alumno=Alumno::find($id);
        $user=User::where('id',$alumno->user_id)->first(); 
      

        $user->delete();

        $alumno->delete();  //eliminar

        return redirect('escuela/alumnos')->with('notification', 'alumno eliminado exitosamente');
    }

      public function grupo($id)
    {
        $user=User::find($id);
        return view('escuela.alumnos.grupo')->with(compact('user')); // formulario de edicion
    }
}