@extends('layouts.app')

@section('body-class', 'escuelas-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
            </div>
    <div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imágen de la escuela"{{ $user->name }}"</h2>

            <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
               
                <span class="btn btn-raised btn-round btn-info btn-file">
                                        <span class="fileinput-new">Agregar foto</span>                                        
                                         <input type="file" name="photo" required></span>
                                    <br />    
                <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                <a href="{{ url('/admin/escuelas') }}" class="btn btn-default btn-round">Volver al listado de escuelas</a>
            </form>

            <hr>

            <div class="row">            
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                       <img src="/school/public/images/users/{{$user->avatar }}" width="250">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>                           
                        </form>
                      </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
