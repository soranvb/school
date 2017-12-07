@extends('layouts.app')
@section('body-class', 'alumnos-page')
@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
   </div>
        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Listado de alumnos del grupo "{{$grupo->name}}"</h2>
                   <!--  <h4 class="title">Cantidad de {{$alumnos->count()}}"</h4> -->                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif                    
                    <div class="team">
                        <div class="row">
                            <a href="{{ url('/docente/asignaturas/notificacion') }}" class="btn btn-info btn-round">Generar notificacion</a>     
                          <form class="form-inline" method="get" action="">
                            <input type="text" placeholder="¿Qué alumno buscas?" class="form-control" name="query" id="search">
                            <button class="btn btn-primary btn-just-icon" type="submit">
                                <i class="material-icons">search</i>
                            </button>
                        </form>
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-md-1 text-center">#</th>
                                    <th class="col-md-1 text-center">Clave</th>
                                    <th class="col-md-2 text-center">Nombre</th> 
                                    <th class="col-md-2 text-center">Foto</th> 
                                    <th class="col-md-1 text-center">Parcial 1</th>
                                    <th class="col-md-1 text-center">Parcial 2</th>
                                    <th class="col-md-1 text-center">Parcial 3</th>
                                    <th class="col-md-1 text-center">Parcial 4</th>
                                    <th class="col-md-1 text-center">Parcial 5</th>
                                    <th class="col-md-1 text-center">Parcial 6</th>
                                    <th class="col-md-1 text-center">Generar Notificacion</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $key => $a)
                                <tr>                                
                                    <td class="text-center">{{($key+1)}}</td>
                                    <td class="text-center">{{$a->clave}}</td>
                                    <td class="text-center">{{$a->users->name}}</td>
                                    <td class="text-center"><img src="{{asset('images/users/'.$a->users->avatar)}}" width="35"></td>
                                    <td>4</td>
                                    <td>7</td>
                                    <td>5</td>
                                    <td>6</td> 
                                    <td>9</td>
                                    <td>7</td>                                        
                                    <td class="td-actions text-center"> 
                                       <a href="{{ url('/docente/asignatura/info'.$a->id) }}" rel="tooltip" title="Notificar" class="btn btn-info btn-simple btn-xs" target="_blank">
                                            <i class="fa fa-info"></i>
                                       </a> 
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