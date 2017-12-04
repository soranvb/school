@extends('layouts.app')

@section('body-class', 'create_docente-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
   </div>
        <div class="main main-raised">
            <div class="container">         

                    
                <div class="section">


                    <h2 class="title text-center">Editar docente seleccionado</h2>

                      <div class="alert alert-dismissible alert-info text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Solo ingrese los campos que desee cambiar</strong> 
                      </div>


                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif



                    <form method= "post" action="{{url('escuela/docentes/'.$user->id.'/edit')}}">
                       {{ csrf_field() }}                                       

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Nombre" name="name"
                                           value="{{ $user->name }}" required autofocus>
                                </div>
                            </div>   

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">fingerprint</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="clave" name="clave" value="{{ $user->clave }}" required>
                                </div>                           
                            </div> 

                            <div class="col-sm-6">  
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" placeholder="Correo electrónico" class="form-control" name="email" value="{{ $user->email }}" requiered>
                                </div>
                            </div>                   

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" />
                                </div>
                            </div> 

                             <div class="col-sm-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation"  />
                                    </div>
                            </div>                    
                        <div class="footer text-center col-sm-12"> 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Job Position</th>
                                        <th>Since</th>
                                        <th class="text-right">Salary</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($docentes_asignaturas as $a)
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>{{$a->asignatura_id}}</td>
                                        <td>{{$a->grupo_id}}</td> 
                                          <td>{{$a->name}}</td> 
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                         
                                     
                                </tbody>
                            </table>
                        </div>
            
                            
                                 <div class="footer text-center col-sm-12">  
                                    <button class="btn btn-primary">Asignar asignatura</button>
                                    <table class="table">
                                <thead>
                                <tr>
                                </tr>
                                </thead>
                                <tbody>
                                   <td></td>
                                <tr>
                                 <button class="btn btn-primary">Guardar cambios</button>
                                 <a href="{{ url('/escuela/docentes') }}" class="btn btn-default">Cancelar</a>
                            </div>
                    </form>                    
                </div>                
            </div>
        </div>
    </div>
@include('includes.footer')
@endsection
