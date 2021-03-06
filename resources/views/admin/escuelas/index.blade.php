@extends('layouts.app')

@section('body-class', 'escuelas-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            </div>      
        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Listado de escuelas</h2>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                    <div class="team">
                        <div class="row">
                             <a href="{{ url('/admin/escuelas/create') }}" class="btn btn-primary btn-round">Registrar nueva escuela</a>
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">Clave</th>
                                    <th class="col-md-2 text-center" >Nombre</th>                                    
                                    <th class="col-md-2 text-center">Fecha Registro</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($escuelas as $escuela)
                                <tr>
                                    <td class="text-center">{{$escuela->user_id}}</td>
                                    <td>{{$escuela->name}}</td>
                                    
                                    <td>{{ Carbon\Carbon::parse($escuela->created_at)->format('d-m-Y') }}</td>
                                    <td>{{$escuela->email}}</td>
                                    <td class="td-actions text-right">
                                            <a href="{{url('admin/escuelas/'.$escuela->id.'/images')}}" rel="tooltip" title="Cambiar imagen" class="btn btn-warning btn-simple btn-xs">
                                                <img src="{{asset('images/users/'.$escuela->avatar)}}" width="20">
                                            </a>
                                             <a href="{{url('admin/escuelas/profile/'.$escuela->id)}}" rel="tooltip" title="Ver Escuela" class="btn btn-info btn-simple btn-xs">
                                             <i class="fa fa-user"></i>
                                        </a> 
                                        <a href="{{url('admin/escuelas/'.$escuela->id.'/edit')}}" rel="tooltip" title="Editar Escuela" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                           <a href="{{url('admin/escuelas/'.$escuela->id.'/eliminar')}}" rel="tooltip" title="Dar de baja escuela" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                {{ $escuelas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.footer')

@endsection