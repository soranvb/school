<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Escuela;
use App\Docente;

class AdminController extends Controller
{

    public function index()
    {        
    	// $users=User::where('role',1)->paginate(10);
        $escuelas=Escuela::join('users', 'users.id', '=', 'user_id' )->orderBy('name')->paginate(10);
    	return view('admin.escuelas.index')->with(compact('escuelas')); //listado de escuelas
    }

    public function create()
    {
    	return view('admin.escuelas.create'); // formulario registro escuela
    }

    public function store(Request $request)
    {
        $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
            'clave'=>'required|numeric',
            'password_confirmation' => 'min:6|same:password',
        ];
        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                'name.max'=>'El nombre es demasiado extenso',
                'email.requiered'=>'Es necesario ingresar email',
                'email.max'=>'Este email es demasiado extenso',
                'email.unique'=>'El email ya se encuentra en uso',
                'password.requiered'=>'Olvido ingresar una contraseña',
                'password.min'=>'La contraseña debe tener por lo menos 6 carracteres',
                'clave.required'=>'Es necesario ingresar una clave',
                'clave.numeric'=>'La clave debe ser numerica',
                'clave.max'=>'La clave es demasiada extensa',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'password_confirmation.min' => 'La contraseña debe tener por lo menos 8 carracteres',
            ];
        $this->validate($request,$rules, $messages);

    	//registrar en la BD
    	// dd($request->all());
    	$user= new User();
    	$user->name = $request->input('name');    	
    	$user->email=$request->input('email');
    	$user->clave=$request->input('clave');
    	$user->password= bcrypt($request->input('password'));
    	$user->role=(1);
    	$user->save();
        $escuela= new escuela();
        $escuela->user_id=$user->id;
        $escuela->save();
    	return redirect('admin/escuelas')->with('notification', 'usuario registrado exitosamente.');
    }

      public function edit($id)
    {
        $user=User::find($id);
        return view('admin.escuelas.edit')->with(compact('user')); // formulario de edicion
    }

    public function update(Request $request, $id)
    {

         $rules =[
            'name'=>'required|max:255',
            'clave'=>'required|max:10|numeric',
            'password_confirmation' => 'min:6|same:password',
            'clave.required'=>'Es necesario ingresar una clave',
            'clave.numeric'=>'La clave debe ser numerica',
            'clave.max'=>'La clave es demasiada extensa',
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre del usuario',
                'name.max'=>'El nombre es demasiado extenso',
                'email.requiered'=>'Es necesario ingresar email',
                'email.max'=>'Este email es demasiado extenso',
                'email.unique'=>'El email ya se encuentra en uso',
                'password.requiered'=>'Olvido ingresar una contraseña',  
                'clave.required'=>'Es necesario ingresar una clave',
                'clave.unique'=>'La clave ya se encuentra en uso',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'password_confirmation.min' => 'La contraseña debe tener por lo menos 8 carracteres',
            ];


        $this->validate($request,$rules, $messages);
        //registrar en la BD
        // dd($request->all());
        $user= User::find($id);
        $user->name = $request->input('name');      
        $user->email=$request->input('email');
        $user->clave=$request->input('clave');
        $password=$request->input('password');
        if($password)
            $user->password=bcrypt($password);        
        $user->save();  //update
        return redirect('admin/escuelas')->with('notification', 'usuario modificado exitosamente');
    }

      public function destroy($id)
    {   
        $user= User::find($id); 
        $escuela=Escuela::where('user_id',$id)->first();
        $escuela->delete();             
        $user->delete();  //eliminar

        return redirect('admin/escuelas')->with('notification', 'usuario eliminado exitosamente');
    }

    public function profile($id)
    {

        $user=User::find($id);

        return view('admin/escuelas/profile')->with(compact('user'));;
    }
}
