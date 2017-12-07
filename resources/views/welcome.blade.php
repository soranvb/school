@extends('layouts.app')

@section('body-class', 'landing-page')

@section('content')
   <div class="header header-filter" style="background-image: url('https://i.pinimg.com/originals/58/f9/79/58f979c7bb0e236e6bf4ccca55edf468.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a Enlace Escolar</h1>
                        <h4>El lazo entre alumno y padre</h4>
                        <br />
                        <a href="" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> Como funciona
                        </a>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">                   
                <div class="section text-center">
                    <h2 class="title">Escuelas Registradas</h2>

                    <div class="team">
                        <div class="row">
                            @foreach ($users as $user)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{{asset('images/users/'.$user->avatar)}}" width="250" alt="Thumbnail Image" class="img-raised img-circle">
                                    <h4 class="title">{{ $user->name }} <br />
                                        <small class="text-muted">Clave {{ $user->clave }}</small>
                                    </h4>
                                    <!-- <p class="description"> <a href="#">links</a> for people to be able to follow them outside the site.</p> -->
                                    <!-- <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a> -->
                                </div>
                            </div>               
                            @endforeach     
                    </div class="text-center">
                    {{$users->links()}}
                    <div>                        
                    </div>
                </div>
                </div> 
            </div>
        </div>
    </div>
@include('includes.footer')
  </div>
@endsection