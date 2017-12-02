<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grupo;
use Auth;

class AlumnoController extends Controller
{
	 public function index()
    {
    	$clave=auth()->user()->clave;    	
    	$users=User::where('clave_escuela',$clave)->where('role','=', 3)->OrderBy('name')->paginate(10);

        // dd($users);         
   		return view('escuela.alumnos.index')->with(compact('users')); //listado de  alumnos
     }

      public function create()
    {
        $clave=auth()->user()->clave;
        $grupos=Grupo::where('clave_escuela',$clave)->OrderBy('name')->get();
    	return view('escuela.alumnos.create')->with(compact('grupos')); // formulario registro alumnos
    }

    public function store(Request $request)
    {

        $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
            'matricula'=>'required',              
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
                'matricula.required'=>'Es necesario ingresar una clave',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'password_confirmation.min' => 'La contraseña debe tener por lo menos 8 carracteres',
            ];


        $this->validate($request,$rules, $messages);
    	$user= new User();
    	$user->name = $request->input('name');    	
    	$user->email=$request->input('email');
    	$user->matricula=$request->input('matricula');
        $user->clave_escuela=auth()->user()->clave;                                                            
    	$user->role=3;
        $user->grupo_id = $request->grupo_id == 0 ? null : $request->grupo_id; 
        $user->password= bcrypt($request->input('password')); 
        $user->save();
        return redirect('escuela/alumnos')->with('notification', 'alumno registrado exitosamente.');
	}

	  public function edit($id)
    {
        $user=User::find($id);
        $clave=auth()->user()->clave;
        $grupos=Grupo::where('clave_escuela',$clave)->OrderBy('name')->get();
        return view('escuela.alumnos.edit')->with(compact('user', 'grupos')); // formulario de edicion
    }

    public function update(Request $request, $id)
    {

          $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',            
            'matricula'=>'required',              
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
        $user= User::find($id);
        $user->name = $request->input('name');      
        $user->email=$request->input('email');
        $user->matricula=$request->input('matricula');
        $user->grupo_id = $request->grupo_id == 0 ? null : $request->grupo_id; 
        $password=$request->input('password');
        if($password)
            $user->password=bcrypt($password);        
        $user->save();  //update

        return redirect('escuela/alumnos')->with('notification', 'alumno modificado exitosamente');
    }

      public function destroy($id)
    {   
        $user= User::find($id);              
        $user->delete();  //eliminar

        return redirect('escuela/alumnos')->with('notification', 'alumno eliminado exitosamente');
    }

      public function grupo($id)
    {
        $user=User::find($id);
        return view('escuela.alumnos.grupo')->with(compact('user')); // formulario de edicion
    }
}