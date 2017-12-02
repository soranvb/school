@extends('layouts.app')

@section('body-class', 'profile-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
   </div>
 <div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="/school/public/images/users/{{$user->avatar}}" alt="Imagen  {{ $user->name }}" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title"> Alumno: {{ $user->name }}</h3>
                        <h4>Escuela :{{Auth::user()->name}} Clave{{Auth::user()->clave}}</h4>
                        <h4> matricula alumno : {{ $user->matricula }}</h4>

                    
                <div class="section">


                    <h2 class="title text-center">Asignar grupo al alumno {{$user->name}}</h2>

                    <!--   <div class="alert alert-dismissible alert-info text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Solo ingrese los campos que desee cambiar</strong> 
                      </div>
 -->

                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif



                    <form method= "post" action="{{url('escuela/alumnos/'.$user->id.'/grupo')}}">
                       {{ csrf_field() }}                                       

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Nombre" name="name"
                                           value="{{ $user->name }}" required autofocus disabled>
                                </div>
                            </div>   

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">fingerprint</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="matricula" name="matricula" value="{{ $user->matricula }}" required disabled>
                                </div>                           
                            </div> 

                            <div class="col-sm-6">  
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" placeholder="Correo electrónico" class="form-control" name="email" value="{{ $user->email }}" requiered disabled>
                                </div>
                            </div>

                            <div class="col-sm-6"> 
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">school</i>
                                    </span>
                                    <input id="clave" type="materia" placeholder="materia" class="form-control" name="materia" value="x{{ $user->materia }}" required>
                                </div>
                            </div>                             
                                 <div class="footer text-center col-sm-12">  
                                 <button class="btn btn-primary">Guardar cambios</button>
                                 <a href="{{ url('/escuela/alumnos') }}" class="btn btn-default">Cancelar</a>
                            </div>
                    </form>                    
                </div>                
            </div>
        </div>

                    </div>                   
                </div>
            </div>           


        </div>        
    </div>
    
@include('includes.footer')
@endsection
