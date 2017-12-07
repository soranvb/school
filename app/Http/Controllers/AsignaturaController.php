<?php

namespace App\Http\Controllers;
use App\User;
use App\Grupo;
use App\Escuela;
use App\Asignatura;
use App\Alumno;
use App\docentes_asignaturas;
use Auth;
use Illuminate\Http\Request;
use DB;

class AsignaturaController extends Controller
{
     public function index()
    {
    	 $id=auth()->user()->id;
         $escuela=Escuela::where('user_id',$id)->first();    	
    	 $asignaturas=Asignatura::where('escuela_id',$escuela->id)->paginate(10);
         // dd($asignaturas->all());

//test
         
            // $docentes_asignaturas=DB::table('docentes_asignaturas')
            // ->join('users', 'docentes_asignaturas.docente_id', '=', 'users.id' )
            // ->join('asignaturas', 'docentes_asignaturas.asignatura_id', '=', 'asignaturas.id' )
            // ->join('grupos', 'docentes_asignaturas.grupo_id', '=', 'grupos.id' )
            // ->select('docentes_asignaturas.*', 'users.name AS docentename', 'asignaturas.name AS asignatura', 'asignaturas.grupo_id AS grupo',
            //  'users.matricula AS matricula', 'grupos.name AS gruponame', 'users.avatar AS avatar',
            //  'users.id AS docente_id', 'asignaturas.clave AS asignaturaclave')
            // ->where('users.clave_escuela', '=', $clave)->get();



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
            'clave'=>'required|numeric',
            'descripcion'=>'max:255',            
            
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre de la Asignatura',
                'name.max'=>'El nombre es demasiado extenso',                
                'descripcion.max'=>'La descripcion es demasiada extensa',            
                'clave.required'=>'Es necesario ingresar una clave',
                'clave.numeric'=>'La clave debe ser numerica',
              
            ];


        $this->validate($request,$rules, $messages);

    	//registrar en la BD
    	// dd($request->all());


        $id=auth()->user()->id;
        $escuela=Escuela::where('user_id',$id)->first();

    	$asignatura= new Asignatura();
    	$asignatura->name = $request->input('name');    	
    	$asignatura->clave=$request->input('clave');
    	$asignatura->descripcion=$request->input('descripcion');
        $asignatura->escuela_id=$escuela->id;    
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
            'clave'=>'required|max:10|numeric',
            'descripcion'=>'max:255',            
            
        ];

        $messages=[
                'name.requiered'=>'Es necesario ingresar el nombre de la Asignatura',
                'name.max'=>'El nombre es demasiado extenso',                
                'descripcion.max'=>'La descripcion es demasiada extensa',            
                'clave.required'=>'Es necesario ingresar una clave',
                'clave.max'=>'Es demasiada extensa la clave',
                 'clave.numeric'=>'La clave debe ser numerica',
              
            ];

        $this->validate($request,$rules, $messages);

        $asignatura=Asignatura::find($id);
    	$asignatura->name = $request->input('name');    	
    	$asignatura->clave=$request->input('clave');
    	$asignatura->descripcion=$request->input('descripcion');  
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
