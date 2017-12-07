<?php

namespace App\Http\Controllers;

use App\User;
use App\Grupo;
use App\Asignatura;
use App\Docente;
use App\Escuela;
use App\Docentes_asignatura;
use Auth;
use Illuminate\Http\Request;
use DB;

class EscuelaController extends Controller
{
    

     public function index()
    {
        $id=auth()->user()->id;
        $escuela=Escuela::where('user_id',$id)->first();
        $docentes=Docente::where('escuela_id',$escuela->id)
        ->join('users', 'users.id', '=', 'user_id' )
        // ->where('users.role','2')
        ->paginate(10);   
        return view('escuela.docentes.index')->with(compact('docentes')); //listado de  docente
    }   
    public function create()
    {        
        $asignaturas=Asignatura::where('escuela_id',auth()->user())->OrderBy('name')->get();
        $grupos=Grupo::where('escuela_id',auth()->user())->OrderBy('name')->get();
    	return view('escuela.docentes.create')->with(compact('asignaturas','grupos')); // formulario registro docentes
    }

    public function store(Request $request)
    {

        $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
            'clave'=>'required|numeric',              
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
                'clave.numeric'=>'La clave debe ser numerica',
                'clave.max'=>'La clave  es demasiada extensa',

            ];


        $this->validate($request,$rules, $messages);

    	//registrar en la BD
    	// dd($request->all());

        $id=auth()->user()->id;
        $escuela=Escuela::where('user_id',$id)->first();


    	$user= new User();
    	$user->name = $request->input('name');    	
    	$user->email=$request->input('email');
    	$user->clave=$request->input('clave');       
        $user->role=2;                                                                 
        $user->password= bcrypt($request->input('password')); 
        $user->save();
        
        $docente= new Docente();
        $docente->escuela_id=$escuela->id;
        $docente->user_id=$user->id;
        $docente->save();        
        
        if($request->input('asignatura_id') != '0')
        {
             $docentes_asignaturas= new Docentes_asignatura();
             $docentes_asignaturas->asignatura_id=$request->input('asignatura_id');
             if($request->input('grupo_id') != '0')
             {                
                $docentes_asignaturas->grupo_id=$request->input('grupo_id');
             }
             else
             {
                $docentes_asignaturas->grupo_id = null;
             }
             $docentes_asignaturas->save();   
        }
        // $docentes_asignaturas= new Docentes_asignatura();
        // $docentes_asignaturas->asignatura_id = $request->asignatura_id == 0 ? null : $request->asignatura_id; 
        // $docentes_asignaturas->docente_id=$user->id;
        // $docentes_asignaturas->grupo_id = $request->grupo_id == 0 ? null : $request->grupo_id; 
        // $docentes_asignaturas->save();       
        
        return redirect('escuela/docentes')->with('notification', 'usuario registrado exitosamente.');                                                                                      		
    	  
    }

     public function edit($id)
    {   
        // $asignaturas=Asignatura::where('escuela_id',auth()->user())->OrderBy('name')->get();
        // $grupos=Grupo::where('escuela_id',auth()->user())->OrderBy('name')->get();
        $user=User::find($id);        
        $docente=Docente::where('user_id' ,'=',$id)->first();
         // dd($docente->id);
        $docentes_asignaturas=Docentes_asignatura::where('docente_id','=',$docente->id)
        ->join('asignaturas', 'asignaturas.id', '=', 'asignatura_id' )->get();

        

        return view('escuela.docentes.edit')->with(compact('user','docentes_asignaturas')); // formulario de edicion

    }

    public function update(Request $request, $id)
    {

          $rules =[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',            
            'clave'=>'required|numeric',              
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
                'clave.required'=>'Es necesario ingresar una clave',
                'clave.numeric'=>'clave debe ser un campo numerico',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
                'password_confirmation.min' => 'La contraseña debe tener por lo menos 8 carracteres',
            ];


        $this->validate($request,$rules, $messages);


        //registrar en la BD
        // dd($request->all());
        $user= User::find($id);
        $docente=Docente::where('user_id','=',$id);  //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<        
        $user->name = $request->input('name');      
        $user->email=$request->input('email');
        $user->clave=$request->input('clave'); 
        $password=$request->input('password');
        if($password)
            $user->password=bcrypt($password);        
        $user->save();  //update

        // if($request->input('asignatura_id') != '0')
        // {
        //      $docentes_asignaturas= Docentes_asignatura::find($id);
        //      $docentes_asignaturas->asignatura_id=$request->input('asignatura_id');
        //      if($request->input('grupo_id') != '0')
        //      {                
        //         $docentes_asignaturas->grupo_id=$request->input('grupo_id');
        //      }
        //      else
        //      {
        //         $docentes_asignaturas->grupo_id = null;
        //      }
        //      $docentes_asignaturas->save();   
        // }

        return redirect('escuela/docentes')->with('notification', 'docente modificado exitosamente');
    }

     public function destroy($id)
    {   
        $user= User::find($id);
        $docente=Docente::where('user_id',$id)->first();
        $docente->delete();                 
        $user->delete();  //eliminar

        return redirect('escuela/docentes')->with('notification', 'Docente eliminado exitosamente');
    }

    public function profile($id)
    {
         $user=User::find($id);
         // $id=auth()->user()->id;
         $escuela=Escuela::where('user_id', auth()->user()->id)->first();
         $grupos=Grupo::where('escuela_id',$escuela->id)->OrderBy('name')->get();
         $asignaturas=Asignatura::where('escuela_id',$escuela->id)->OrderBy('name')->get();              
         $docente=Docente::where('user_id' ,'=',$id)->first();   
           // dd($docente);      
        $docentes_asignaturas=Docentes_asignatura::select('grupos.name as gruponame','asignaturas.name as asignaturaname', 'docentes_asignaturas.id as id',
            'asignaturas.clave as asignatura_clave', 'grupos.clave as grupo_clave')
        ->where('docente_id','=',$docente->id)
        ->join('asignaturas', 'asignaturas.id', '=', 'asignatura_id' )
        ->join('grupos', 'grupos.id', '=', 'grupo_id')
        ->get();       
        return view('escuela/docentes/profile')->with(compact('user','grupos','asignaturas','docentes_asignaturas','docente'));
    }

    public function guardar(Request $request, $id)
    {
       
            
            if($request->input('grupo_id') != '0')
            {  
                if ($request->input('asignatura_id')!= '0') 
                {
                 $docentes_asignaturas= new Docentes_asignatura();
                 $docentes_asignaturas->asignatura_id=$request->input('asignatura_id');              
                 $docentes_asignaturas->grupo_id=$request->input('grupo_id');
                 $docentes_asignaturas->docente_id=$id;
                 $docentes_asignaturas->save();
                 $user=Docente::where('id',$id)->first();
                 return Redirect('escuela/docentes/profile/'.$user->user_id)->with('notification', 'Asignacion exitosa');
                }                
            }
             
                 $user=Docente::where('id',$id)->first();
                 return Redirect('escuela/docentes/profile/'.$user->user_id)->with('notification', 'Error selecione tanto grupo como asignatura');       
    }

    public function eliminar($id)
    {   
        $docentes_asignaturas= Docentes_asignatura::find($id);
        $user=Docente::where('id',$docentes_asignaturas->docente_id)->first();
        $docentes_asignaturas->delete();


        return Redirect('escuela/docentes/profile/'.$user->user_id)->with('notification', 'Asignacion eliminada');
    }


}
