@extends('layouts.app')

@section('body-class', 'create_docente-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
   </div>
        <div class="main main-raised">
            <div class="container">         

                    
                <div class="section">


                    <h2 class="title text-center">Editar grupo seleccionado</h2>

                      <div class="alert alert-dismissible alert-info text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Solo ingrese los campos que desee cambiar</strong> 
                      </div>


                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif



                    <form method= "post" action="{{url('escuela/grupos/'.$grupo->id.'/edit')}}">
                       {{ csrf_field() }}                                       

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Nombre" name="name"
                                           value="{{ $grupo->name }}" required autofocus>
                                </div>
                             </div>   

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">fingerprint</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="clave" name="clave" value="{{ $grupo->clave }}" required>
                                </div>                           
                            </div>  

                            <div class="col-sm-6">  
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">description</i>
                                    </span>
                                    <input id="text" type="text" placeholder="Descripcion" class="form-control" name="descripcion" value="{{ $grupo->descripcion }}">
                                </div>
                            </div>         

                                          

                                                     
                                 <div class="footer text-center col-sm-12">  
                                 <button class="btn btn-primary">Guardar cambios</button>
                                 <a href="{{ url('/escuela/grupos') }}" class="btn btn-default">Cancelar</a>
                            </div>
                    </form>                    
                </div>                
            </div>
        </div>
    </div>
@include('includes.footer')
@endsection
