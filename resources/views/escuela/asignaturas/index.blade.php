@extends('layouts.app')

@section('body-class', 'escuelas-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
            </div>      

        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Listado de asignaturas</h2>


                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                    
                    <div class="team">
                        <div class="row">
                             <!-- <a href="{{ url('/escuela/asignaturas/create') }}" class="btn btn-primary btn-round">Registrar nueva a</a> -->
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Clave</th>
                                    <th class="col-md-2 text-center" >Nombre</th>
                                    <th class="col-md-2 text-center">Grupo</th>
                                    <th class="col-md-2 text-center">Descripcion</th>                                    
                                    <th class="text-right">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaturas as $a)
                                <tr>
                                    <td class="text-center"> {{$a->id}}</td>
                                    <td>{{$a->name}}</td>
                                     <td>{{$a->escuela_id ? $a->escuela_id : 'Sin asignar'}}</td>
                                    <td>{{$a->descripcion}}</td>

                                    
                                    <td class="td-actions text-right">

                                             <a href="#" rel="tooltip" title="Ver asignatura" class="btn btn-info btn-simple btn-xs">
                                             <i class="fa fa-user"></i>
                                            </a>                                        

                                            <a href="{{url('escuela/asignaturas/'.$a->id.'/edit')}}" rel="tooltip" title="Editar asignatura" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                            </a>

                                             <a href="{{url('escuela/asignaturas/'.$a->id.'/eliminar')}}" rel="tooltip" title="Dar de baja " class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>                                      
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                {{ $asignaturas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.footer')

@endsection