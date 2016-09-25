<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CookAdventure</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

   

    <!-- Latest compiled and minified JavaScript -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-primary navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    CookAdventure
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
               <!-- <ul class="nav navbar-nav">
                    <li class="disabled"><a  href="{{ url('/home') }}">Recetas</a></li>
                    <li class="disabled"><a  href="{{ url('/home') }}">Amigos</a></li>
                    <li class="disabled"><a  href="{{ url('/home') }}">Busqueda Avanzada</a></li>
                </ul>-->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{Auth::user()->name }}<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <!--<li class="disabled"><a href="{{ url('/user') }}"><i class="fa fa-btn fa-user"></i>Mi Cuenta</a></li>
                                <li class="disabled"><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-education"></i> Mi Progreso</a></li>-->
                                <li><a href="{{ url('/user/recetas') }}"><i class="fa fa-btn fa-list-alt"></i>Mis Recetas</a></li>                               
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-3">
                @if(isset($nivel)&&isset($progreso)&&isset($NRecetasUsuario))
                <div class="panel panel-primary">
                    <div class="panel-heading"> Estadísticas</div>

                    <div class="panel-body">
                        <div class="row">
                              <div class="col-sm-12 col-md-12">
                                  <center>
                                      <img height="60" width="60" src="/images/gorro" alt="...">
                                      <div class="caption">
                                        <h3>{{Auth::user()->name}}</h3>
                                        <h2><span class="label label-primary">{{$nivel}}</span></h2>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$progreso}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$progreso}}%">
                                                    <span class="sr-only">{{$progreso}}% Complete</span>
                                            </div>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                              <span class="badge"> {{$NRecetasUsuario}} </span>
                                              Nº Recetas
                                            </li>
                                           <li class="list-group-item active"> 
                                              Mejor Receta
                                           </li>
                                           <li class="list-group-item">
                                           @if(isset($MejoresRecetas[0]))
                                              {{$MejoresRecetas[0]->nombreReceta}}
                                           @else
                                              No tienes recetas publicadas.
                                           @endif   
                                           </li>
                                        </ul>
                                      </div>
                                  </center>
                              </div>
                          </div>     
                    </div>
                </div>
                @endif
            </div>
        @yield('content')
        </div>

    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
