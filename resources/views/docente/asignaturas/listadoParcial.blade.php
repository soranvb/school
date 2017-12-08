@extends('layouts.app')
@section('body-class', 'alumnos-page')
@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
   </div>
        <div class="main main-raised">
            <div class="container">   
                <div class="section text-center">
                    <h2 class="title">Parciales de la materia "{{$docentes_asignaturas->asignatura->name}}"</h2>
                   <!--  <h4 class="title">Cantidad de {{$alumnos->count()}}"</h4> -->
                      <a href="{{ url('/docente/asignaturas/') }}" class="btn btn-info btn-round">Volver</a>  
                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif                    
                    <div class="team">
                        <div class="row">
                           
                         <!--  <form class="form-inline" method="get" action=""> -->
                            <!-- <input type="text" placeholder="¿Qué alumno buscas?" class="form-control" name="query" id="search"> -->
                           <!--  <button class="btn btn-primary btn-just-icon" type="submit">
                                <i class="material-icons">search</i>
                            </button> -->
                        </form>
                           <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-md-1 text-center">#</th>
                                    <th class="col-md-1 text-center">Clave</th>
                                    <th class="col-md-2 text-center">Nombre</th> 
                                    <th class="col-md-1 text-center">Parcial 1</th>
                                    <th class="col-md-1 text-center">Parcial 2</th>
                                    <th class="col-md-1 text-center">Parcial 3</th>
                                    <th class="col-md-1 text-center">Parcial 4</th>
                                    <th class="col-md-1 text-center">Parcial 5</th>
                                    <th class="col-md-1 text-center">Parcial 6</th>
                                    <th class="col-md-1 text-center">Guardar</th>
                                    <th class="col-md-1 text-center">Guardar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $key => $a)
                                     <form method= "post" action="">
                                     {{ csrf_field() }} 
                                <tr>                                
                                    <td class="text-center">{{($key+1)}}</td>
                                    <td class="text-center">x</td>
                                    <td class="text-center">{{$a->users->name}}</td>
                                    <td><select  name="parcial_uno">
                                            <option value="0">0</option>
                                            @for ($i = 1; $i < 11; $i++)
                                            <option value=" {{ $i }}" @if ($i == (@$a->parcial->uno))  selected  @endif > {{ $i }} </option>

                                            @endfor
                                        </select></td>
                                    <td><select  name="parcial_dos">
                                            <option value="0">0</option>
                                            @for ($i = 1; $i < 11; $i++)
                                            <option value=" {{ $i }}"@if ($i == (@$a->parcial->dos)) selected  @endif > {{ $i }} </option>
                                            @endfor
                                        </select></td>
                                   <td><select  name="parcial_tres">
                                            <option value="0">0</option>
                                            @for ($i = 1; $i < 11; $i++)
                                            <option value=" {{ $i }}"@if ($i == (@$a->parcial->tres)) selected  @endif > {{ $i }} </option>
                                            @endfor
                                        </select></td>
                                    <td><select  name="parcial_cuatro">
                                            <option value="0">0</option>
                                            @for ($i = 1; $i < 11; $i++)
                                            <option value=" {{ $i }}"@if ($i == (@$a->parcial->cuatro)) selected  @endif > {{ $i }} </option>
                                            @endfor
                                        </select></td>
                                    <td><select  name="parcial_cinco">
                                            <option value="0">0</option>
                                            @for ($i = 1; $i < 11; $i++)
                                            <option value=" {{ $i }}"@if ($i == (@$a->parcial->cinco)) selected  @endif > {{ $i }} </option>
                                            @endfor
                                        </select></td>
                                    <td><select  name="parcial_seis">
                                            <option value="0">0</option>
                                            @for ($i = 1; $i < 11; $i++)
                                            <option value=" {{ $i }}"@if ($i == (@$a->parcial->seis)) selected  @endif > {{ $i }} </option>
                                            @endfor
                                        </select></td> 
                                        <td>{{@$a->parcial ? @$a->parcial->prom : '0'}}</td>                                       
                                    <td class="td-actions text-center"> 
                                         <button class=" btn-primary btn-just-icon btn-xs " type="submit">Guardar
                                            <!-- <i class="material-icons">save</i> -->
                                        </button>                                     
                                    </td>
                                </tr>
                                <input name="alumno_id" type="hidden" value="{{$a->id}}">
                            </form>
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