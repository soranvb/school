<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/escolar/public/uploads/avatars/g.png">
    <link rel="icon" type="image/png" href="/escolar/public/uploads/avatars/g.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Enlace Escolar</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"/>

</head>

<body class="@yield('body-class')">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- areglar icono -->
                 <a class="navbar-brand" href="/">
                    <img src="{{asset('/escolar/public/uploads/avatars/g.png')}}" width="35" height="35" border="0" alt="logo">                            
                 </a>
                 <a class="navbar-brand" href="/school/public/">Enlace Escolar</a>
            </div>
                <!-- aqui va -->
            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
               @guest
                    <li><a  href="{{ route('login') }}"> <i class="material-icons">account_circle</i>  Ingresar</a>
                    </li>  

                @else
                        @if(auth()->user()->role==0)
                    <li>
                            <a href="{{ url('/admin/escuelas') }}">
                                <i class="material-icons">school</i> Consultar Escuelas
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/escuelas/create') }}">
                                <i class="material-icons">add_box</i> Registrar nueva escuela
                            </a>
                        </li>                        
                        @endif

                          @if(auth()->user()->role==1)

                          <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="material-icons">school</i> Alumnos
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header"></li>
                                                 <li><a href="{{ url('/escuela/alumnos') }}">Listado de alumnos</a></li>
                                                 <li><a href="{{ url('/escuela/alumnos/create') }}">Registrar nuevo alumno</a></li>                                
                                            </ul>
                                        </li>

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                               <i class="material-icons">local_library</i> Docentes
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header"></li>
                                                <li><a href="{{ url('/escuela/docentes') }}">Listado de docentes</a></li>
                                                <li><a href="{{ url('/escuela/docentes/create') }}">Registrar nuevo docente</a></li>
                                          
                                            </ul>
                                        </li>

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                               <i class="material-icons">book</i> Asignaturas
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header"></li>
                                                 <li><a href="{{ url('/escuela/asignaturas') }}">Listado de asignaturas</a></li> 
                                                 <li><a href="{{ url('/escuela/asignaturas/create') }}">Registrar nueva asignatura</a></li>                                               
                                            </ul>
                                        </li>  


                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                               <i class="material-icons">group</i> Grupos
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header"></li>
                                                 <li><a href="{{ url('/escuela/grupos') }}">Listado de grupos</a></li> 
                                                 <li><a href="{{ url('/escuela/grupos/create') }}">Registrar nuevo grupo</a></li>                                               
                                            </ul>
                                        </li>    

                         @endif

                              @if(auth()->user()->role==2)

                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                               <i class="material-icons">book</i> Asignaturas
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header"></li>
                                                 <li><a href="{{ url('/docente/asignaturas') }}">Listado de asignaturas</a></li> 
                                                <!--  <li><a href="{{ url('/escuela/asignaturas/create') }}">Registrar nueva asignatura</a></li>  -->                                              
                                            </ul>
                                        </li>  
                              @endif

                                  

                    <li class="dropdown">                                                  
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:45px;">
                                 <img src="/school/public/images/users/{{Auth::user()->avatar }}" style="width:40px; height:40px; position:absolute; top:0px; left:0px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                             </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Desconectarse
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                   <!--  <li>
                        <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        @yield('content')
        </div>
</body>
    <!--   Core JS Files   -->
    <script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/material.min.js') }}"></script>

   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('/js/nouislider.min.js') }}" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="{{ asset('/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{ asset('/js/material-kit.js') }}" type="text/javascript"></script>

</html>

