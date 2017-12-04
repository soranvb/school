@extends('layouts.app')

@section('body-class', 'escuelas-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
            </div>      

        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Listado de alumnos</h2>


                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                    
                    <div class="team">
                        <div class="row">
                             <a href="{{ url('/escuela/alumnos/create') }}" class="btn btn-primary btn-round">Registrar nuevo alumno</a>
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Matricula</th>
                                    <th class="col-md-2 text-center" >Nombre</th>
                                    <th class="col-md-2 text-center">Grupo</th>
                                    <th class="col-md-2 text-center">Fecha Registro</th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                <tr>
                                    <td class="text-center">{{$alumno->clave}}</td>
                                    <td>{{$alumno->users->name}}</td>
                                    <td>{{$alumno->grupos ? $alumno->grupos->name : 'Sin asignar'}}</td>
                                    <td>{{ Carbon\Carbon::parse($alumno->created_at)->format('d-m-Y') }}</td>
                                    <td class="td-actions text-right">                           

                                            <a href="{{url('escuela/alumnos/'.$alumno->user_id.'/images')}}" rel="tooltip" title="Cambiar imagen" class="btn btn-warning btn-simple btn-xs">
                                                <img src="/school/public/images/users/{{$alumno->users->avatar }}" width="20">
                                            </a>

                                             <a href="{{url('escuela/alumnos/'.$alumno->id.'/grupo')}}" rel="tooltip" title="Ver alumno" class="btn btn-info btn-simple btn-xs">
                                             <i class="fa fa-user"></i>
                                             </a>                                        
                                            <a href="{{url('escuela/alumnos/'.$alumno->id.'/edit')}}" rel="tooltip" title="Editar alumno" class="btn btn-warning btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{url('escuela/alumnos/'.$alumno->id.'/eliminar')}}" rel="tooltip" title="Dar de baja " class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>                                          
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                {{ $alumnos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.footer')

@endsection