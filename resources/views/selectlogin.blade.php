
<link rel="stylesheet" href="{{asset('css/selectlogin.css')}}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{asset('patient/img/iconito.png')}}">
<title>Seleccion de inicio</title>
<div class="col-md-12" id="header" style="margin-bottom:20px!important;"><h3  class="text-center"><span style="color:#A5CD39;">Bienvenido</span>¿Con que perfil quieres utilizar el sistema?  </h3></div>
<section>
        <div class="container" >

            <div class="row">



                <div class="col-md-4" >
                        <p class="mt-3 w-100 float-left text-center"><strong>Centro de salud</strong></p>
                    <div class="card profile-card-1">
                        <img src="{{asset('images/rosario.jpg')}}" alt="profile-sample1" class="background"/>
                        <img src="{{asset('images/centrosalu.jpg')}}" alt="profile-image" class="profile"/>
                        <div class="card-content">

                            <a  href="{{url('center/login')}}" class="btn btn-success">iniciar sesion</a>

                            <a href="#" class="btn btn-info"> crear cuenta</a>

                        </div>
                    </div>

                </div>

                    <div class="col-md-4" >
                        <p class="mt-3 w-100 float-left text-center"><strong>paciente</strong></p>
                        <div class="card profile-card-1">
                                <div class="card-img-block">
                                        <img src="{{asset('images/fondopaciente.png')}}" alt="profile-sample1" />
                                    </div>
                                    <img src="{{asset('images/pepo.png')}}" alt="profile-image" class="profile"/>
                            <div class="card-content">

                                <a  href="{{url('login')}}" class="btn btn-success">iniciar sesion</a>

                                <a href="#" class="btn btn-info"> crear cuenta</a>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-4" >
                            <p class="mt-3 w-100 float-left text-center"><strong>Profesional</strong></p>
                            <div class="card profile-card-1">
                                    <div class="card-img-block">
                                            <img src="{{asset('images/meditor2.png')}}" alt="profile-sample1" />
                                        </div>
                                        <img src="{{asset('images/meditor.png')}}" alt="profile-image" class="profile"/>
                                <div class="card-content">

                                    <a  href="{{route('medic.login')}}" class="btn btn-success">iniciar sesion</a>

                                    <a href="#" class="btn btn-info"> crear cuenta</a>

                                </div>
                            </div>

                        </div>






                </div>


                <footer id="footer" >

                        <ul class="icons">
                           <li><img class="img img-responsive" id="jorge" src="{{asset('patient/img/logo.png')}}" alt=""></li>
                           <li><a href="#" class="icon alt fa-facebook fa-lg"><span class="label">Facebook</span></a></li>
                           <li><a href="#" class="icon alt fa-instagram fa-lg"><span class="label">Instagram</span></a></li>
                           <li> <a href="#" class="icon alt fa-github fa-lg"><span class="label">GitHub</span></a></li>


                        </ul>

                                &copy;  <a style="color:#A5CD39;" href="{{url('/')}}">Medicsafe</a> all rigths reserved.

                    </footer>



            </div>
        </div>

</div>
    </section>

