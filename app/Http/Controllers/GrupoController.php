<?php

namespace App\Http\Controllers;

use App\User;
use App\Grupo;
use App\Asignatura;
use App\Escuela;
use App\Docentes_asignatura;
use Auth;
use Illuminate\Http\Request;
use Validator, Input, Redirect; 
use App\Http\Requests;

class GrupoController extends Controller
{
     public function index()
    {
    	$id=auth()->user()->id;
         $escuela=Escuela::where('user_id',$id)->first();     	
    	 $grupos=Grupo::where('escuela_id',$escuela->id)->paginate(10);

         // dd($grupos);
   		return view('escuela.grupos.index')->with(compact('grupos')); //listado de  grupos
     }

      public function create()
    {
    	return view('escuela.grupos.create'); // formulario registro grupos
    }

     public function store(Request $request)
    {

        $rules =[
            'name'=>'required|max:255',
            'clave'=>'required|numeric',
            'descripcion'=>'max:255',

        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre de la grupo',
                'name.max'=>'El nombre es demasiado extenso',                
                'descripcion.max'=>'La descripcion es demasiada extensa',            
                'clave.required'=>'Es necesario ingresar una clave',  
                'clave.numeric'=>'Clave debe ser numerico',            
            ];
        $this->validate($request,$rules, $messages);

        $id=auth()->user()->id;
        $escuela=Escuela::where('user_id',$id)->first();

    	$grupo= new Grupo();
    	$grupo->name = $request->input('name');    	
    	$grupo->clave=$request->input('clave');
        $grupo->descripcion=$request->input('descripcion');     	
        $grupo->escuela_id=$escuela->id;       
        $grupo->save();
       return redirect('escuela/grupos')->with('notification', 'grupo registrado exitosamente.');                                                                                     
    }

        public function edit($id)
    {
        $grupo=Grupo::find($id);
        return view('escuela.grupos.edit')->with(compact('grupo')); // formulario de edicion
    }


		public function update(Request $request, $id)
    {
    	 $rules =[
            'name'=>'required|max:255',
            'descripcion'=>'max:255',
            'clave'=>'required',           
            
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre de la Asignatura',
                'name.max'=>'El nombre es demasiado extenso',
                'descripcion.max'=>'La descripcion es demasiado extensa',              
                'clave.required'=>'Es necesario ingresar una clave',
              
            ];

        $this->validate($request,$rules, $messages);

        $grupo=Grupo::find($id);
    	$grupo->name = $request->input('name');    	
    	$grupo->clave=$request->input('clave');
        $grupo->descripcion=$request->input('descripcion');              
        $grupo->save();
        return redirect('escuela/grupos')->with('notification', 'Grupo editado exitosamente.'); 
    }

     public function destroy($id)
    {   
        $grupo= Grupo::find($id);              
        $grupo->delete();  //eliminar

        return redirect('escuela/grupos')->with('notification', 'Grupo eliminado exitosamente');
    }
}
