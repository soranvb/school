@extends('layouts.app')
@section('body-class', 'profile-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="/school/public/images/users/{{$user->avatar}}" alt="Imagen  {{ $user->name }}" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title">{{ $user->name }}</h3>
                        <h5>Clave :{{$user->clave}}</h5>
                        <h5>Email : {{ $user->email }}</h5>

                        <!-- PROBAR PROFILE -->
                    </div>  
                       @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                     @endif
                    
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif                 
                
            </div>
            
              <h2 class="title text-center">Listado de asignaturas y grupos asignados </h2>
             <div class="team">
                        <div class="row">
                          <!--   <a href="{{ url('/escuela/docentes/profile') }}" class="btn btn-primary btn-round">Asignar nuevo grupo y asignatura</a> --> 
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-md-2 text-center">#</th>
                                    <th class="col-md-2 text-center">Clave asignatura</th>
                                    <th class="col-md-2 text-center" >Asignatura</th>                                    
                                    <th class="col-md-2 text-center">Grupo</th>
                                    <th class="col-md-2 text-center"> Clave grupo</th>
                                    <th class="col-md-2 text-right">Desasignar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes_asignaturas as $key => $asignatura)
                                <tr>
                                    <td class="text-center">{{($key+1)}}</td>
                                    <td class="text-center">{{$asignatura->asignatura_clave}}</td>
                                    <td class="text-center">{{$asignatura->asignaturaname}}</td>                                    
                                    <td class="text-center">{{$asignatura->gruponame}}</td>
                                    <td class="text-center">{{$asignatura->grupo_clave}}</td>
                                    <td class="td-actions text-right">

                                            <a >                                                
                                                 <img src="/school/public/images/users/{{$user->avatar }}" width="20">
                                            </a>

                                            <a href="{{url('escuela/docentes/profile/'.$asignatura->id.'/eliminar')}}" rel="tooltip" title="Desasignar " class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>                                   
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                               
                        </div>
                    </div> 
                   
            <h2 class="title text-center">Nuevo asignamiento</h2>
            <form method= "post" action="{{url('/escuela/docentes/profile/'.$docente->id)}}">
                       {{ csrf_field() }} 
                                <div class="col-sm-6 text-center ">
                                    <div class="form-group label-floating  ">
                                        <label class="control-label">Asignar Grupo</label>
                                        <select class="form-control" name="grupo_id">
                                            <option value="0">Sin Asignar</option>
                                            @foreach ($grupos as $grupo)
                                            <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center ">
                                    <div class="form-group label-floating  ">
                                        <label class="control-label">Asignar asignatura</label>
                                        <select class="form-control" name="asignatura_id">
                                            <option value="0">Sin Asignar</option>
                                            @foreach ($asignaturas as $asignatura)
                                            <option value="{{ $asignatura->id }}">{{ $asignatura->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                          <div class="footer text-center col-sm-12">  
                                 <button class="btn btn-primary">Asignar</button>
                                 <a href="{{ url('/escuela/docentes') }}" class="btn btn-default">Cancelar</a>
                                 </div>
                    </form> 
                      



        </div>    </div>    
    </div>
</div>

       

@include('includes.footer')
@endsection
