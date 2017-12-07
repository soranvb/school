@extends('layouts.app')

@section('body-class', 'create_escuela-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
   </div>
        <div class="main main-raised">
            <div class="container">         
                    
                <div class="section">
                    <h2 class="title text-center">Registrar nuevo docente</h2>

                       @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                      @endif

                    <form method= "post" action="{{url('/escuela/docentes')}}">
                       {{ csrf_field() }}   
                       <input name="role" type="hidden" value="2">                  

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Nombre" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>   

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">fingerprint</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Clave del docente" name="clave" value="{{ old('clave') }}" required>
                                </div>                           
                            </div> 

                            <div class="col-sm-6">  
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" placeholder="Correo electrónico" class="form-control" name="email" value="{{ old('email') }}" requiered>
                                </div>
                            </div>

                         
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required />
                                </div>
                            </div> 

                            <div class="col-sm-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required />
                                    </div>
                            </div>
            <!--                  <div class="col-sm-6 text-center ">
                                <div class="form-group label-floating  ">
                                    <label class="control-label">Asignar asignatura</label>
                                    <select class="form-control" name="asignatura_id">
                                        <option value="0">Sin Asignar</option>
                                        @foreach ($asignaturas as $asignatura)
                                        <option value="{{ $asignatura->id }}" >{{ $asignatura->name }}</option>

                                                                             
                                        @endforeach 
                                    </select>
                                    </div>
                                </div>
                             </div>

                             <div class="col-sm-6 text-center ">
                                <div class="form-group label-floating  ">
                                    <label class="control-label">Asignar grupo</label>
                                    <select class="form-control" name="grupo_id">
                                        <option value="0">Sin Asignar</option>
                                        @foreach ($grupos as $grupo)
                                        <option value="{{ $grupo->id }}" >{{ $grupo->name }}</option>

                                                                             
                                        @endforeach 
                                    </select>
                                    </div>
                                </div> -->
                             </div>
                                 
                                 <div class="footer text-center col-sm-12">  
                                 <button class="btn btn-primary">Registrar docente</button>
                                 <a href="{{ url('/escuela/docentes') }}" class="btn btn-default">Cancelar</a>
                            </div>
                    </form>                    
                </div>                
            </div>
        </div>
    </div>
@include('includes.footer')
@endsection
