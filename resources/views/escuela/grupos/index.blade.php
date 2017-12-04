@extends('layouts.app')

@section('body-class', 'escuelas-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
            </div>      

        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Listado de grupos</h2>


                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                    
                    <div class="team">
                        <div class="row">
                             <!-- <a href="{{ url('/escuela/grupos/create') }}" class="btn btn-primary btn-round">Registrar nueva grupo</a> -->
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Clave</th>
                                    <th class="col-md-2 text-center" >Nombre</th>
                                    <th class="col-md-4 text-center" >Descripcion</th>                                                                 
                                    <th class="text-right">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                <tr>
                                    <td class="text-center">{{$grupo->id}}</td>
                                    <td>{{$grupo->name}}</td>
                                    <td>{{$grupo->descripcion}}</td>
                                    <td class="td-actions text-right">                                      

                                            <a href="#" rel="tooltip" title="Ver grupo" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-user"></i>
                                            </a>                                        
                                            <a href="{{url('escuela/grupos/'.$grupo->id.'/edit')}}" rel="tooltip" title="Editar grupo" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url('escuela/grupos/'.$grupo->id.'/eliminar')}}" rel="tooltip" title="Dar de baja " class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>      
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                {{ $grupos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.footer')

@endsection