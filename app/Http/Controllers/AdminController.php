<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index()
    {
    	$users=User::where('role',1)->paginate(10);
    	return view('admin.escuelas.index')->with(compact('users')); //listado de escuelas
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
            'clave'=>'required|unique:users',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
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
                'clave.unique'=>'La clave ya se encuentra en uso',
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

    	return redirect('admin/escuelas')->with('notification', 'usuario registrado exitosamente.');
    }

      public function edit($id)
    {
        $user=User::find($id);
        return view('admin.escuelas.edit')->with(compact('user')); // formulario de edicion
    }

    public function update(Request $request, $id)
    {


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
        $user->delete();  //eliminar

        return redirect('admin/escuelas')->with('notification', 'usuario eliminado exitosamente');
    }

    public function profile($id)
    {
         $user=User::find($id);
        return view('admin/escuelas/profile')->with(compact('user'));;
    }


}
