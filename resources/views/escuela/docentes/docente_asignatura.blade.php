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
                                    <th class="text-center">Matricula</th>
                                    <th class="col-md-2 text-center" >Nombre</th>                              
                                    <th class="col-md-2 text-center">Asignaturas Asignadas </th>
                                    <th class="col-md-2 text-center">Grupo </th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes_asignaturas as $a)                                                                     
                                <tr> 
                                    <td class="text-center">{{$a->matricula}}</td>
                                    <td class="text-center">{{$a->docente}}</td>
                                    <td>{{$a->asignatura}}</td>
                                    <td>{{$a->gruponame}}</td>
                                    <td class="td-actions text-right">
                                   
                                    <form method="post" action="{{ url('escuela/docentes/'.$a->docente_id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <a href="{{url('escuela/docentes/'.$a->docente_id.'/images')}}" rel="tooltip" title="Cambiar imagen" class="btn btn-warning btn-simple btn-xs">
                                                <img src="/school/public/images/users/{{$a->avatar }}" width="20">
                                            </a>

                                             <a href="#" rel="tooltip" title="Ver docente" class="btn btn-info btn-simple btn-xs">
                                             <i class="fa fa-user"></i>
                                        </a>                                        

                                        <a href="{{url('escuela/docentes/'.$a->docente_id.'/edit')}}" rel="tooltip" title="Editar docente" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                            <button type="submit" rel="tooltip" title="Eliminar docente" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>                      
                    @endforeach

                                
                                </tbody>
                                </table>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.footer')

@endsection