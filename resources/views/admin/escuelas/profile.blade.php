@extends('layouts.app')
@section('body-class', 'profile-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="/school/public/images/users/{{$user->avatar}}" alt="Imagen  {{ $user->name }}" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title">{{ $user->name }}</h3>
                        <h5>Escuela Clave :{{$user->clave}}</h5>
                        <h5> email : {{ $user->email }}</h5>

                        <!-- PROBAR PROFILE -->
                        
                    </div>                   
                </div>
            </div>
            <div class=" text-center">
               
            </div> 


        </div>        
    </div>
</div>

<!-- <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
      </div>
      <form method="post" action="{{ url('/cart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $user->id }}">
        <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
          </div>
      </form>
    </div>
  </div>
</div>  -->        

@include('includes.footer')
@endsection
