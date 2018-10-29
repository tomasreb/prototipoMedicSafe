<div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item" @click="menu=0">
                    <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Mi perfil</a>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i>Diagnosticos</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item" @click="menu=1" >
                            <a class="nav-link" href="#"><i class="icon-bag"></i> Recientes</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-notebook"></i> Estúdios</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item" @click="menu=3">
                            <a class="nav-link" href="#"><i class="icon-cloud-upload"></i> Ver mis estudios</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item " @click="menu=4">
                    <a class="nav-link" href="#"><i class="icon-people"></i> Mis profesionales</a>

                </li>

                <li class="nav-item" @click="menu=6">
                    <a class="nav-link" href="#"><i class="icon-call-out"></i> Pedir turnos</a>
                </li>
                <li class="nav-item" @click="menu=7">
                    <a class="nav-link" href="#"><i class="icon-globe"></i> MI historia clinica</a>
                </li>




                <li class="nav-item" >
                    <a class="nav-link" href="#"><i class="icon-rocket"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                </li>
                <li class="nav-item" @click="menu=10">

                    <a class="nav-link" href="#"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">MS</span></a>
                </li>
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
