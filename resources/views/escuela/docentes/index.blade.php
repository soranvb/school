@extends('layouts.app')

@section('body-class', 'escuelas-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
            </div>      

        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Listado de docentes</h2>


                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                    
                    <div class="team">
                        <div class="row">
                             <a href="{{ url('/escuela/docentes/create') }}" class="btn btn-primary btn-round">Registrar nuevo docente</a>
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-md-1 text-center">#</th>
                                    <th class="col-md-2 text-center">Clave</th>
                                    <th class="col-md-2 text-center" >Nombre</th>
                                    <!-- <th class="col-md-2 text-center">xxxx</th> -->
                                    <th class="col-md-1 text-center">Fecha Registro</th>
                                    <th class="col-md-1 text-center">E-mail</th>
                                    <th class="col-md-2 text-center">Asignaturas y grupos asignados</th>
                                    <th class="col-md-3 text-right">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $key=> $user)
                                <tr>
                                    <td class="text-center">{{($key+1)}}</td>
                                    <td class="text-center">{{$user->clave}}</td>
                                    <td>{{$user->name}}</td>
                                    <!-- <td>$user->grupo->name</td> --> <!--CON  ESTE SE TRAE LOS DATOS ASOCIADOS CON GRUPO -->
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>        
                                            <a href="{{url('escuela/docentes/profile/'.$user->id)}}" rel="tooltip" title="Asignaturas-Grupos" class="btn btn-primary btn-simple btn-xs">
                                             <i class="fa fa-group"></i>Asignar/consultar
                                            </a>       
                                    </td>
                                    <td class="td-actions text-right">

                                            <a href="{{url('escuela/docentes/'.$user->id.'/images')}}" rel="tooltip" title="Cambiar imagen" class="btn btn-warning btn-simple btn-xs">                                                
                                                 <img src="/school/public/images/users/{{$user->avatar }}" width="20">
                                            </a>                                             

                                             <a href="#" rel="tooltip" title="Ver docente" class="btn btn-info btn-simple btn-xs">
                                             <i class="fa fa-user"></i>
                                             </a>    

                                       

                                            <a href="{{url('escuela/docentes/'.$user->id.'/edit')}}" rel="tooltip" title="Editar docente" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{url('escuela/docentes/'.$user->id.'/eliminar')}}" rel="tooltip" title="Dar de baja " class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>                                   
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                {{ $docentes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.footer')

@endsection