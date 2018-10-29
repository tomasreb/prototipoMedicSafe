<div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item" @click="menu=0">
                    <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Escritorio</a>
                </li>

                <li class="nav-item " @click="menu=4">
                    <a class="nav-link" href="#"><i class="icon-people"></i> Mis pacientes</a>

                </li>
                <li class="nav-item " @click="menu=5">
                    <a class="nav-link" href="#"><i class="icon-user-follow"></i> Asociar un paciente </a>

                </li>

                        <li class="nav-item" @click="menu=1" >
                            <a class="nav-link" href="#"><i class="icon-bag"></i> Mis diagnosticos</a>
                        </li>






                <li class="nav-item" @click="menu=6">
                    <a class="nav-link" href="#"><i class="icon-calendar"></i> Mi agenda</a>
                </li>
                <li class="nav-item" @click="menu=7">
                    <a class="nav-link" href="#"><i class="icon-globe"></i>Mis repostres</a>
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
