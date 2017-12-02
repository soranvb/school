<?php

namespace App\Http\Controllers;
use App\User;
use App\Grupo;
use App\Asignatura;
use Auth;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
     public function index()
    {
    	$clave=auth()->user()->clave;    	
    	$asignaturas=Asignatura::where('clave_escuela',$clave)->paginate(10);    	
    	return view('escuela.asignaturas.index')->with(compact('asignaturas')); //listado
    }

      public function create()
    {
    	return view('escuela.asignaturas.create'); // formulario registro asignaturas
    }

        public function store(Request $request)
    {

        $rules =[
            'name'=>'required|max:255',
            'clave'=>'required',
            'descripcion'=>'max:255',            
            
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre de la Asignatura',
                'name.max'=>'El nombre es demasiado extenso',                
                'descripcion.max'=>'La descripcion es demasiada extensa',            
                'clave.required'=>'Es necesario ingresar una clave',
              
            ];


        $this->validate($request,$rules, $messages);

    	//registrar en la BD
    	// dd($request->all());
    	$asignatura= new Asignatura();
    	$asignatura->name = $request->input('name');    	
    	$asignatura->clave=$request->input('clave');
    	$asignatura->descripcion=$request->input('descripcion');
        $asignatura->clave_escuela=auth()->user()->clave;       
        $asignatura->save();
       return redirect('escuela/asignaturas')->with('notification', 'asignatura registrada exitosamente.');                                                                                     
    }

      public function edit($id)
    {
        $asignatura=Asignatura::find($id);
        return view('escuela.asignaturas.edit')->with(compact('asignatura')); // formulario de edicion
    }
	
		public function update(Request $request, $id)
    {
    	 $rules =[
            'name'=>'required|max:255',
            'clave'=>'required',
            'descripcion'=>'max:255',            
            
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre de la Asignatura',
                'name.max'=>'El nombre es demasiado extenso',                
                'descripcion.max'=>'La descripcion es demasiada extensa',            
                'clave.required'=>'Es necesario ingresar una clave',
              
            ];

        $this->validate($request,$rules, $messages);

        $asignatura=Asignatura::find($id);
    	$asignatura->name = $request->input('name');    	
    	$asignatura->clave=$request->input('clave');
    	$asignatura->descripcion=$request->input('descripcion');
        $asignatura->clave_escuela=auth()->user()->clave;       
        $asignatura->save();
        return redirect('escuela/asignaturas')->with('notification', 'asignatura editada exitosamente.'); 
    }

     public function destroy($id)
    {   
        $asignatura= Asignatura::find($id);              
        $asignatura->delete();  //eliminar

        return redirect('escuela/asignaturas')->with('notification', 'asignatura eliminado exitosamente');
    }
}
