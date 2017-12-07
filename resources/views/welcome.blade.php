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
                    <!-- <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Let's talk product</h2>
                            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
                        </div>
                    </div> -->

                <!--     <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">First Feature</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Second Feature</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Third Feature</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="section text-center">
                    <h2 class="title">Escuelas Registradas</h2>

                    <div class="team">
                        <div class="row">
                            @foreach ($users as $user)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{‌{ asset('images/users/'.$user->avatar) }}" width="250" alt="Thumbnail Image" class="img-raised img-circle">
                                    <h4 class="title">{{ $user->name }} <br />
                                        <small class="text-muted">Clave {{ $user->clave }}</small>
                                    </h4>
                                    <p class="description"> <a href="#">links</a> for people to be able to follow them outside the site.</p>
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


                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">Work with us</h2>
                            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Name</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Your Messge</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@include('includes.footer')
</div>
@endsection