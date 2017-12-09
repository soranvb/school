<?php

namespace App\Http\Controllers;

use App\User;
use App\Grupo;
use App\Asignatura;
use App\Docente;
use App\Escuela;
use App\Alumno;
use App\Parcial;
use App\Docentes_asignatura;
use Auth;
use Illuminate\Http\Request;
use DB;

class DocenteController extends Controller
{
     public function index()
    {
    	 $id=auth()->user()->id;
    	 $docente=Docente::where('user_id',$id)->first();
       $docentes_asignaturas=Docentes_asignatura::where('docente_id',@$docente->id)->get();
       if($docentes_asignaturas==null ) 
       $docentes_asignaturas ='1';
     return view('docente.asignaturas.index')->with(compact('docentes_asignaturas'));

   }

         public function listadoAlumnos($id)
    {    
    	   $grupo=Grupo::find($id);
    	   $alumnos=Alumno::where('grupo_id',$id)->OrderBy('id')->get();	
          // dd($alumnos);
    	return view('docente.asignaturas.listadoAlumnos')->with(compact('alumnos','grupo')); //listado
    }

    public function listadoParcial($id)
    {    
          // $grupo=Grupo::find($id);
          // $alumnos=Alumno::where('grupo_id',$id)->OrderBy('id')->get();
          // $id=auth()->user()->id;
          // $docente=Docente::where('user_id',$id)->first();
          $docentes_asignaturas=Docentes_asignatura::find($id)->first();
          $alumnos=Alumno::where('grupo_id',$docentes_asignaturas->grupo_id)->OrderBy('id')->get();             
          // dd($alumnos);
          // $parcial=Parcial::where('docentes_asignaturas_id',$docentes_asignaturas->id)->first();
          
           $parcial= Parcial::where('alumno_id',$id_alumno)
          ->where('docentes_asignaturas_id',$id)
          ->where('asignatura_id',$docentes_asignaturas->asignatura_id)
          ->first();

          // dd($parcial);

           
   


      return view('docente.asignaturas.listadoParcial')->with(compact('alumnos','docentes_asignaturas, parcial')); //listado
    }

     public function guardar(Request $request, $id)
    {
          $docentes_asignaturas=Docentes_asignatura::find($id);
          $id_alumno= $request->input('alumno_id');        

          $parcial= Parcial::where('alumno_id',$id_alumno)
          ->where('docentes_asignaturas_id',$id)
          ->first();

          

          if($parcial==null )  
          {
            $parcial= new Parcial();
          }
          $parcial->docentes_asignaturas_id=($id);
          $parcial->alumno_id = $request->input('alumno_id');
          $parcial->asignatura_id=$docentes_asignaturas->asignatura_id;
          $parcial->uno = $request->input('parcial_uno');
          $parcial->dos = $request->input('parcial_dos');
          $parcial->tres = $request->input('parcial_tres');
          $parcial->cuatro = $request->input('parcial_cuatro');
          $parcial->cinco = $request->input('parcial_cinco');
          $parcial->seis = $request->input('parcial_seis');
          $parcial->prom = (collect([$request->input('parcial_uno'), $request->input('parcial_dos'), $request->input('parcial_tres'),
          $request->input('parcial_cuatro'),$request->input('parcial_cinco'),$request->input('parcial_seis')])->avg());
          $parcial->save();          
      return redirect('docente/asignaturas/grupo/parcial/'.$id)->with('notification', 'Asignacion exitosa');
    }


  

}
