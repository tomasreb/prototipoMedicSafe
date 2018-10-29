<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="prototipo para edufest">
    <meta name="author" content="whynot">
    <meta name="keyword" content="prototipo edufest urquiza rosario sta fe ">
    <link rel="shortcut icon" href="{{asset('patient/img/iconito.png')}}">

    <title>Bienvenido {{Auth::user()->name}}</title>
    <!-- Icons -->
    <link href="{{asset('patient/css/compiladopatient.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('patient/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('patient/css/dropzone.scss')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Escritorio</a>
            </li>

        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Notificaciones</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-envelope-o"></i> Solicitudes
                        <span class="badge badge-success">3</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-tasks"></i> derivaciones
                        <span class="badge badge-danger">2</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown" style="margin-right:25px!important;" >
                <a class="nav-link dropdown-toggle nav-link"  data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src={{Auth::user()->img_profile}}  class="img-avatar">
                    <span class="d-md-down-none"> {{ Auth::user()->name }} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" @click="menu=0"><i class="fa fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>
                    <form id="logout-form" action="{{ route('medic.logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        @include('medic.components.sidebar')

        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>




</div>
    <footer class="app-footer sticky-footer">
            &copy;  <a style="color:#A5CD39;" href="{{url('/')}}">Medicsafe</a><span>all rigths reserved.</span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('patient/js/pace.min.js')}}"></script>
    {{--  <script src="{{asset('patient/js/compiladopatient.js')}}"></script>  --}}
    <script src="{{asset('js/app.js')}}"></script>

    <script src="{{asset('patient/js/template.js')}}"></script>
    <script src="{{asset('patient/js/sweetalert2.all.js')}}"></script>
    <script src="{{asset('patient/js/jspdf.min.js')}}"></script>
    <script src="{{asset('patient/js/dropzone.js')}}"></script>
    <script src="{{asset('js/instascan.min.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>

</body>

</html>
