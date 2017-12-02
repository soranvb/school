<?php

namespace App\Http\Controllers;

use App\User;
use App\Grupo;
use App\Asignatura;
use Auth;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    
    public function index()
    {
    	$clave=auth()->user()->clave;    	
    	$users=User::where('clave_escuela',$clave)->paginate(10);
        // $asignaturas=Asignatura::where('clave_escuela',$clave)->get();



        

   		return view('escuela.docentes.index')->with(compact('users')); //listado de  docentes
     }

    public function create()
    {
    	return view('escuela.docentes.create'); // formulario registro docentes
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

    	//registrar en la BD
    	// dd($request->all());
    	$user= new User();
    	$user->name = $request->input('name');    	
    	$user->email=$request->input('email');
    	$user->matricula=$request->input('matricula');
        $user->clave_escuela=auth()->user()->clave;
        $user->role=2;                                                                 
           $user->password= bcrypt($request->input('password')); 
           $user->save();
       return redirect('escuela/docentes')->with('notification', 'usuario registrado exitosamente.');                                                                                      		
    	  
    }

     public function edit($id)
    {
        $user=User::find($id);
        return view('escuela.docentes.edit')->with(compact('user')); // formulario de edicion
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
        $password=$request->input('password');
        if($password)
            $user->password=bcrypt($password);        
        $user->save();  //update

        return redirect('escuela/docentes')->with('notification', 'docente modificado exitosamente');
    }

     public function destroy($id)
    {   
        $user= User::find($id);              
        $user->delete();  //eliminar

        return redirect('escuela/docentes')->with('notification', 'docente eliminado exitosamente');
    }

}
