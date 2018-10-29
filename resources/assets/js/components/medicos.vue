<template>


<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Paciente</li>
        <li class="breadcrumb-item active">Profesionales</li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
                    <i class="icon-user-follow"></i>&nbsp;nuevo profesional
                </button>
                <button type="button" class="btn btn-success" @click="pavear()">
                    <i class="icon-game-controller"></i>&nbsp;ayuda
                </button>
            </div>

            <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-12">
                       <strong> <span>buscar profesionales Elija una opcion</span></strong>
                        <div class="input-group">
                            <select class="form-control col-md-3" v-model="criterio">
                              <option value="name">Nombre</option>
                              <option value="specialty">Especialidad</option>
                            </select>
                            <input type="text" v-model="buscar" @keyup.enter="listarMedicos(1,buscar,criterio)" class="form-control col-md-6" placeholder="Ingrese el profesional o especialidad">
                            <button type="submit" class="btn btn-primary" @click="listarMedicos(1,buscar,criterio)" ><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                 <div v-if="arrayMedicos.length == 0 " >
                    <div class="col-md-12"><span>aun no tines profesionales asociados</span>asocia uno para compartir tu historia clinica con el</div>



                     </div>
                     <!-- end vif for medic list -->
                    <div v-else >
                    <table class="table table-responsive table-bordered table-striped table-sm">
                    <thead>
                        <tr>

                            <th>Profesional</th>
                            <th>Especialidad</th>
                            <th>Llamar</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="medicos in arrayMedicos" :key="medicos.id" >

                            <td >
                              <template class="container-fluid">



                            <button type="button" class="btn btn-sm btn-info"  @click="perfilMedico(medicos.name, medicos.specialty, medicos.matricula, medicos.tel_cel, medicos.img_profile)">  <i class="icon-user" > <span v-text="medicos.name"></span> </i></button>
                            <button type="button" class="btn btn-danger btn-sm" @click="eliminarMedico(medicos.id)">
                            <i class="icon-trash" > <span>desasociar</span> </i></button>
                             </template>

                                </td>
                            <td v-text="medicos.specialty"></td>
                            <td >
                               <!-- <span><button type="button" class="btn btn-success bt-sm" data-toggle="modal" data-target="#modalAgenda"> <i class="icon-call-out"></i> </button></span> -->
                               <span><a href="tel:+543454199555"><button type="button" class="btn btn-success bt-sm" > <i class="icon-call-out"></i> </button></a></span>
                                <!-- <span class="badge badge-success">  Activo</span> -->

                            </td>


                        </tr>



                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1, buscar, criterio)">Ant</a>
                        </li>
                        <li class="page-item " v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active': '']" >
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page , buscar , criterio)" v-text="page" ></a>
                        </li>

                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1 , buscar, criterio)" >Sig</a>
                        </li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Asociar Profesional</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label text-danger" for="text-input">Atencion</label>
                            <div class="col-md-9">

                                <span class="help-block">Muestre el siguiente codigo Qr a su profesional para asociarlo </span>
                                <span class="help-block">O comparta el codigo unico de usuario. </span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label text-success" for="email-input">Codigo de usuario unico: </label>
                            <div class="col-md-12">
                                    <p class="help-block" v-text="usuario.codigo"></p>


                            </div>
                            <div style="margin:auto!important;"><img class="img img-responsive" style="min-width:250px!important; min-height:250px!important" v-bind:src= usuario.ruta_codigo></div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>

                </div>
            </div>


            <!-- /.modal-content new medic stone -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-info" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >Agenda del profesional</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                        <label for="turno">Selecciona el dia disponible</label>
                        <input type="date" name="turno" id="pedirturnito">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary " @click="pavear()" >Solicitar turno</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalMedic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-info" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" >Agenda del profesional</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                        <label for="turno">Selecciona el dia disponible</label>
                        <input type="date" name="turno" id="pedirturnito">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary " @click="pavear()" >Solicitar turno</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Fin del modal ver doc -->

</main>

</template>

<script>
    export default {
        data(){
            return{
                nombre:'',

                arrayMedicos: [],
                usuario : '',
                pagination : {
                    'total': 0 ,
                    'current_page': 0 ,
                    'per_page' : 0 ,
                    'last_page': 0 ,
                    'from': 0 ,
                    'to': 0 ,
                },
                offset : 3,
                criterio : 'name',
                buscar : '',



            }
        },
        computed:{
            isActived : function(){
                return this.pagination.current_page;
            },

            //calcula los elementos de paginacion (ver documentaicon de vue q se yo)
            pagesNumber : function(){
                if(!this.pagination.to){
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if(from < 1){
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while(from<= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;

            }


        },
        methods:{
            pavear(){
                swal({
                title: 'estamos trabajando en esta seccion!',

                imageUrl: 'patient/img/tenor.gif',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true
                })
            },

            perfilMedico(medicos, especialidad, matricula, cel, img){
                swal({
                title: 'Perfil de : ' + medicos ,
                text : 'sad',
                imageUrl: img,
                imageWidth: 250,
                imageHeight: 250,
                imageAlt: 'Custom image',
                html : '<p style="text-size:20px!important;">Nombre : '+medicos+'</p><p>Especialidad: '+especialidad+'</p><p>Matricula Nacional: '+matricula+'</p> <p>Telefono celular: '+cel+'</p>'

                })
            },






            listarMedicos(page , buscar , criterio){
                let me=this;

                var url =  'home/mismedicos?page=' + page +'&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function(response){
                    var respuesta = response.data;
                    me.arrayMedicos = respuesta.medicos.data;
                    me.pagination = respuesta.pagination;
                    me.usuario = respuesta.usuario;

                })

                // siii hijo de la gran reputisima maadre anda, me merezco un haren de novias fiesteras y 6 barriles de cerveza!
                .catch(function(error){
                    console.log(error);
                });

            },
            cambiarPagina(page, buscar, criterio){
                let me = this;
                me.pagination.current_page = page;
                me.listarMedicos(page, buscar, criterio);


            },
            eliminarMedico(idmedico){

                const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                    title: '¿Está seguro de eliminar este profesional de su lista?',
                    text: "Ya no tendra acceso a su historial clinico, y el proceso es irreversible, deberá luego asociarse personalmente",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Eliminar !',
                    cancelButtonText: 'No, cancelar ya!',
                    reverseButtons: true
                    }).then((result) => {
                if (result.value) {
                    let me=this;
                        axios.post('home/eliminarMedico',{
                            'id' : idmedico
                        }).then(function(response){
                            me.listarMedicos(1, '', '');
                            swalWithBootstrapButtons(
                            'Permisos Quitados !',
                            'Este profesional ya no podra ver su historia clinica',
                            'success'
                            )



                        });




                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                    'cancelado',
                    'Este profesional podra seguir viendo su historial',
                    'error'
                    )
                }
                });
            }
        },

        mounted() {
            this.listarMedicos(1, this.buscar, this.criterio);


        }
    }

</script>

