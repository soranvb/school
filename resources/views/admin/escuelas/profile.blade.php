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
                        <img src="{{asset('images/users/'.$user->avatar)}}" alt="Imagen  {{ $user->name }}" class="img-circle img-responsive img-raised">
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

@include('includes.footer')
@endsection
