<template>
    <main class="main">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Profesional</li>
        <li class="breadcrumb-item active">Mis Pacientes</li>
    </ol>
        <div class="container-fluid">

    <div class="row">
        <div class="card col-md-12 p3" style="margin-top:20px!important">
        <div class="form-group row">
                    <div class="col-md-12">
                       <strong> <span>buscar pacientes Elija una opcion</span></strong>
                        <div class="input-group">
                            <select class="form-control col-md-3" v-model="criterio">
                              <option value="name">Nombre</option>
                              <option value="dni">dni</option>
                            </select>
                            <input type="text" v-model="buscar" @keyup.enter="listarPacientes(1,buscar,criterio)" class="form-control col-md-6" placeholder="Ingrese el nombre del paciente o su dni">
                            <a type="submit" class="btn btn-primary" @click="listarPacientes(1,buscar,criterio)" ><i class="fa fa-search"></i> Buscar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="arrayPacientes.length == 0 " >
                    <div class="col-md-12 fade"><span>aun no tines pacientes asociados</span> <strong>asocia uno!</strong> </div>
            </div>

            <div v-else >
                <div v-for="pacientes in arrayPacientes" :key="pacientes.id">
                <div class="row" style="padding:50px!important;">
         <div class="d-flex justify-content-center h-100 col-md-3">
			<div class="image_outer_container">
				<div class="green_icon"></div>
				<div class="image_inner_container">
					<img v-bind:src= pacientes.profile_image>
				</div>
			</div>
		</div>
        <div class="col-md-8" style="margin-left:50px!important;">
            <ul class="list-group lilita">
            <strong> <li class="list-group-item" v-text="pacientes.name"></li></strong>

            <li class="list-group-item"><i class="fa fa-home"></i> <strong>Direccion : </strong> <span v-text="pacientes.direccion"></span> </li>
            <li class="list-group-item"><i class="fa fa-phone"></i> <strong>Telefono fijo : </strong> <span v-text="pacientes.tel_fijo"></span> </li>
            <li class="list-group-item"><i class="fa fa-mobile"></i> <strong>Telefono celular : </strong> <span v-text="pacientes.tel_cel"></span> <span><a href="tel:+543454199555"><a type="a" class="btn btn-success bt-sm llamar" > <i class="icon-call-out"></i> </a></a></span> </li>
            <li class="list-group-item"><i class="icon-envelope"></i> <strong>E-mail : </strong> <span v-text="pacientes.email"></span> </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-5"><a type="a" class="btn btn-info bt-sm" @click="abrirModal(pacientes.id);" > <i class="icon-call-out"></i> <span>Ver historia completa</span> </a></div>
                    <div class="col-md-5 offset-md-2"><a type="a" class="btn btn-info bt-sm" @click="modalAgregar(pacientes.id)">  <i class="icon-call-out"></i> <span>agregar un parte</span></a></div>
                </div>


            </li>

            </ul>
        </div>







        <!-- resume -->

            </div>
                </div>



            </div>




    </div>
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
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="paciente.name"></h4> <span> Ultima actualizacion <p v-text="historia.updated_at"></p> </span>
                            <a type="a" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">


                <div class="panel panel-default panel-table">
                    <strong> <h3>Datos cronicos del paciente</h3> </strong>
                     <table class="table table-striped table-condensed">
                  <thead>

              </thead>
              <tbody>
                <tr>
                    <td>Grupo sanguineo</td>
                    <td v-text="historia.grupo_sanguineo"></td>

                </tr>

                <tr>
                    <td>Vih Sida </td>
                    <td v-text="historia.vih"></td>


                </tr>
                <tr>
                    <td>Tatuajes</td>
                    <td v-text="historia.tatuajes"></td>
                    <td class="hiden" :class="{'nohiden' : actualizame}">
                    <select name="" id="" v-model="actualizarTatuaje" >
                        <option value="NO" selected >No tiene</option>
                        <option value="SI">Si tiene</option>


                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Diabetes</td>
                    <td v-text="historia.diabetes"></td>
                    <td class="hiden" :class="{'nohiden' : actualizame}">
                    <select name="" id="" v-model="actualizarDiabetes" >
                        <option value="NO" selected >no</option>
                        <option value="SI">si</option>


                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Cardiopatias </td>
                    <td v-text="historia.cardiopatias"></td>
                    <td class="hiden" :class="{'nohiden' : actualizame}">
                    <select name="" id="" v-model="actualizarCardio" >
                        <option value="hipertension" selected>hipertension</option>
                        <option value="miocardiopatia dilatada">Miocardiopatía dilatada</option>
                        <option value="estenosis aortica">Estenosis aórtica</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tabaquismo </td>
                    <td v-text="historia.tabaquismo"></td>
                    <td class="hiden" :class="{'nohiden' : actualizame}">
                    <select name="" id="" v-model="actualizarTabaquismo" >
                        <option value="SI" selected>si fuma</option>
                        <option value="NO">no fuma</option>

                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Alcoholismo </td>
                    <td v-text="historia.alcoholismo"></td>
                    <td class="hiden" :class="{'nohiden' : actualizame}">
                    <select name="" id="" v-model="actualizarAlcoholismo" >
                        <option value="SI" selected>SI</option>
                        <option value="NO">NO</option>

                        </select>
                    </td>

                </tr>
                <tr> <td><a type="a" class="btn btn-primary btn-lg btn-block " @click="actualizarCabecera()">Actualizar</a></td>
                <td> <a type="a" class="btn btn-success btn-md btn-block hiden" :class="{'nohiden':actualizame}" @click="guardarCabecera(historia.id , paciente.id)">GUARDAR CAMBIOS</a> </td>
                <td> <a type="a" class="btn btn-danger btn-md btn-block hiden" :class="{'nohiden':actualizame}" @click="cancelarCabecera()">Cancelar</a> </td>
                </tr>

              </tbody>
            </table>

                <strong> <h3>Partes medicos del paciente</h3> </strong>
            <template v-for="(parte, index) in partes" >
            <table :key="parte" class="table table-striped table-condensed">
                <tr>
                    <td class="text-primary">identificador de parte</td>
                    <td v-text="parte.id">
                    </td>
                    <td>Fecha de creacion</td>
                    <td v-text="parte.created_at">
                    </td>
                </tr>
                <tr>
                    <td>Motivo de consulta</td>
                    <td v-text="parte.motivo">
                    </td>
                </tr>
                <tr>
                    <td>sintomas</td>
                    <td v-text="parte.sintomas">
                    </td>
                </tr>
                <tr>
                    <td>Enfermedad actual </td>
                    <td v-text="parte.enfermedad_actual">
                    </td>
                </tr>
                <tr>
                <td>Diagnostico</td>
                    <td v-text="parte.diagnostico">
                    </td>
                </tr>
                <tr>
                    <td>tratamiento solicitado</td>
                    <td v-text="parte.tratamiento">
                    </td>
                </tr>
                <div v-if="parte.solicito_estudios == 'SI' ">
                <tr>
                <td>  <a class="btn btn-success" @click="verEstudio(index)"> VER ESTUDIOS </a>


                </td>
                </tr>
                </div>

                </table>
            </template>

                    </div>






                        </div>
                        <div class="modal-footer">
                            <a type="a" class="btn btn-secondary" @click="cerrarModal()">Cerrar</a>

                            <a type="a" class="btn btn-primary" @click="modalAgregar(paciente.id)">Agregar parte</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

                <!-- modal de agregar partesmedicos -->

             <div class="modal fade" tabindex="-1" :class="{'mostrar' : modalagregar}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"  >Agregar Parte médico</h4>
                            <a type="a" class="close" @click="cerrarAgregar()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        <div class="modal-body">


                            <div class="container">
                                <div class="row">
                                    <form action="" method="post" enctype="multipart/form-data" class="col-md-12 go-right">
                                        <h2 v-text="paciente.name"></h2>
                                        <p>Complete los campos a su criterio.</p>
                                        <div class="form-group">
                                        <textarea  type="text" class="form-control" required v-model="motivo"></textarea>
                                        <label for="name">Motivo de consulta</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea  type="text" class="form-control" required v-model="sintomas" ></textarea>
                                        <label for="sintomas">Sintomas</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" required v-model="enfermedad_actual"></textarea>
                                        <label for="enfermedad_actual">Enfermedad actual</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea  class="form-control" required v-model="diagnostico"></textarea>
                                        <label for="diagnostico">Diagnostico</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea  class="form-control" required v-model="tratamiento"></textarea>
                                        <label for="tratamiento">Tratamiento</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" required v-model="lugar_atencion">
                                        <label for="lugar_atencion">Lugar de atencion</label>
                                    </div>
                                    <div class="form-group">
                                        <input  type="text" class="form-control" required v-model="estudio_solicitado">
                                        <label for="solicito_estudios">Estudio solicitado</label>
                                    </div>

                                    <a class="btn btn-success" @click="registrarParte()"  >Agregar</a>
                                    <div v-show="errorParte" class="form-group row div-error">
                                        <div class="text-center text-error">
                                            <div v-for="error in errorMostrarMsje" :key="error" v-text="error"></div>
                                        </div>
                                    </div>
                                    </form>


                                </div>
                            </div>








                        </div>
                        <div class="modal-footer">
                            <a type="a" class="btn btn-secondary" @click="cerrarAgregar()">Cerrar</a>


                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog de agregar partes emdicos -->
            </div>
    </main>
</template>



<script>
    // import profile from './components' ;
    export default {
        data(){
            return{
                nombre:'',


                arrayPacientes: [],
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


                paciente : '',
                estudios : '',
                partes : '',
                medicos: '',
                modal: 0,
                modalagregar : 0,
                historia : '',

                errorParte : 0 ,
                errorMostrarMsje: [],



                motivo: '',
                sintomas:'',
                enfermedad_actual:'',
                diagnostico:'',
                tratamiento:'',
                lugar_atencion:'',
                estudio_solicitado:'',
                actualizame : 0,

                actualizarCardio : '',
                actualizarTatuaje : '',
                actualizarDiabetes : '',
                actualizarTabaquismo : '',
                actualizarAlcoholismo : '',











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

        methods : {
             listarPacientes(page , buscar , criterio){
                let me=this;

                var url =  'medic/listarpacientes?page=' + page +'&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function(response){
                    var respuesta = response.data;
                    me.arrayPacientes = respuesta.pacientes.data;
                    me.pagination = respuesta.pagination;
                    me.llorar();



                })

                // siii hijo de la gran reputisima maadre anda, me merezco un haren de novias fiesteras y 6 barriles de cerveza!
                .catch(function(error){
                    console.log(error);
                });

            },
            cambiarPagina(page, buscar, criterio){
                let me = this;
                me.pagination.current_page = page;
                me.listarPacientes(page, buscar, criterio);


            },
            verEstudio(id){
                let me =this;



                    swal({
                        // esta para el orto porque recibe el id de paciente y no tiene ni ojota que ver con
                        // el tema del estudio, buscarle la vuelta por el lado de
                        // indice menos uno deberas joven jedai, si la republica quereis salvar
                    title: me.estudios[id].name,

                    text: me.estudios[id].informe,
                    imageUrl: me.estudios[id].ruta_imagen,
                    imageWidth: 600,
                    imageHeight: 300,

                    animation: true
                    // actualizacion!!! ya anda, era una pelotudes, pasar el indice nomas como id forre


                    });







             },



            llorar(){
                let me = this;
                if(me.arrayPacientes == 0 ){
                    swal({
                        title: '<strong>Ups!</strong>',
                        type: 'info',
                        html:
                            'su busqueda <b>no</b> coincide con ninguno de nuestros registros, ' +
                            '<p>Intenta con otros datos</p> ' +
                            'o con otro paciente!',
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-thumbs-up">OK, Genial!</i>',
                        cancelButtonText:
                            '<i class="fa fa-thumbs-down">Mal año</i>',

                        });
                }
                return 0 ;
            },
            abrirModal(id){
                let me = this;



               axios.post('medic/historiapaciente',{'id' : id}).then(function(response){
                   var respuesta = response.data;
                   me.paciente = respuesta.paciente;
                   me.partes = respuesta.partes;
                   me.estudios = respuesta.estudios;
                   me.historia = respuesta.historia;
                   me.medicos = respuesta.medicos;
                //    alert(me.paciente[1].lugar_atencion);
                   me.modal = 1;


                    });

            },
            modalAgregar(id){
                let me = this;
                axios.post('medic/historiapaciente',{'id' : id}).then(function(response){
                   var respuesta = response.data;
                   me.paciente = respuesta.paciente;
                   me.partes = respuesta.partes;
                   me.estudios = respuesta.estudios;
                   me.historia = respuesta.historia;

                   me.modal = 0;
                   me.modalagregar = 1;

                });



            },
            cerrarModal(){
                this.modal = 0;

            },

            cerrarAgregar(){
                this.modalagregar = 0;
            },
            validarParte(){
                this.errorParte = 0;
                this.errorMostrarMsje = [];


                if(!this.motivo) this.errorMostrarMsje.push('El motivo de consulta no puede estar vacio')
                if(!this.sintomas) this.errorMostrarMsje.push('los sintomas del paciente no pueden estar vacios')
                if(!this.enfermedad_actual) this.errorMostrarMsje.push('debe diagnosticar una enfermedad o escribir alguna enfermedad sospechada')
                if(!this.diagnostico) this.errorMostrarMsje.push('debe dar, segun su criterio, un diagnostico')
                if(!this.tratamiento) this.errorMostrarMsje.push('Si no requiere tratamiento escriba "no requiero tratamientos" ')
                if(!this.lugar_atencion) this.errorMostrarMsje.push('Especifique donde realizo la practica medica ')
                if(this.errorMostrarMsje.length) this.errorParte = 1 ;
                return this.errorParte;
               },
            registrarParte(){
                let me = this;
                if(this.validarParte()){
                    return;

                }
                axios.post('medic/cargarparte',{
                    'history' : this.historia.id,
                    'motivo' : this.motivo,
                    'sintomas' : this.sintomas,
                    'enfermedad_actual' : this.enfermedad_actual,
                    'diagnostico' : this.diagnostico,
                    'tratamiento' : this.tratamiento,
                    'estudio_solicitado' : this.estudio_solicitado,
                    'lugar_atencion' : this.lugar_atencion,


                    }).then(function(response){
                        me.modalagregar = 0 ;
                        me.modal = 0 ;
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Su parte ha sido creado con exito! ',
                            showConfirmButton: false,
                            timer: 1600
                            });




                });

            },
             actualizarCabecera(){
                 let me = this;
                 me.actualizame = 1;
             },
             cancelarCabecera(){
                 let me = this;
                        me.actualizarCardio = '',
                        me.actualizarDiabetes = '',
                        me.actualizarTabaquismo = '',
                        me.actualizarAlcoholismo = '',
                        me.actualizarTatuaje = '',

                        me.actualizame = 0 ;

             },
            guardarCabecera(id){
                let me = this;
                axios.post('medic/guardarcabecera' , {
                    'id' : id,
                    'tatuajes' : me.actualizarTatuaje,
                    'diabetes' : me.actualizarDiabetes,
                    'cardiopatias' : me.actualizarCardio,
                    'tabaquismo' : me.actualizarTabaquismo,
                    'alcoholismo' : me.actualizarAlcoholismo,



                    }).then(function(response){

                        me.actualizarCardio = '',
                        me.actualizarDiabetes = '',
                        me.actualizarTabaquismo = '',
                        me.actualizarAlcoholismo = '',
                        me.actualizarTatuaje = '',

                        me.actualizame = 0 ;

                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'has actualizado la historia clinica con exito! ',
                            showConfirmButton: false,
                            timer: 1600
                            });




                         }).then(function(){
                             me.abrirModal(id);
                         });





            }


        },


        mounted()  {
            this.listarPacientes(1, this.buscar, this.criterio);



        },

     }
</script>
<style>
.image_outer_container{
       	margin-top: auto;
       	margin-bottom: auto;
       	border-radius: 50%;
       	position: relative;
       }

       .image_inner_container{
       	border-radius: 50%;
       	padding: 5px;
        background: #A5CD39;
        background: -webkit-linear-gradient(to bottom, #1d91fd, #A5CD39);
        background: linear-gradient(to bottom,  #1d91fd, #A5CD39);
       }
       .image_inner_container img{
       	height: 200px;
       	width: 200px;
       	border-radius: 50%;
       	border: 5px solid white;
       }

       .image_outer_container .green_icon{
         background-color: green;
         position: absolute;
         right: 30px;
         bottom: 10px;
         height: 30px;
         width: 30px;
         border:5px solid white;
         border-radius: 50%;
       }
       .llamar{
           border-radius: 50%!important;
       }
       .lilita{
           width: 100%!important;
       }
       .modal-dialog{
           min-width: 90%!important;
       }
        .modal-body {
                max-height: calc(100vh - 210px);
                overflow-y: auto;
            }

       .modal-content{
        width: 100% !important;
        position: absolute !important;
        }
        .mostrar{
            display: list-item !important;
            opacity: 1 !important;
            min-width: 100%!important;

            background-color: #3c29297a !important;
        }
        .panel-table {
    display:table;
}
.panel-table > .panel-heading {
    display: table-header-group;
    background: transparent;
}
.panel-table > .panel-body {
    display: table-row-group;
}
.panel-table > .panel-body:before,
.panel-table > .panel-body:after {
    content:none;
}
.panel-table > .panel-footer {
    display: table-footer-group;
    background: transparent;
}
.panel-table > div > .tr {
    display: table-row;
}
.panel-table > div:last-child > .tr:last-child > .td {
    border-bottom: none;
}
.panel-table .td {
    display: table-cell;
    padding: 15px;
    border: 1px solid #ddd;
    border-top: none;
    border-left: none;
}
.panel-table .td:last-child {
    border-right: none;
}
.panel-table > .panel-heading > .tr > .td,
.panel-table > .panel-footer > .tr > .td {
    background-color: #f5f5f5;
}
.panel-table > .panel-heading > .tr > .td:first-child {
    border-radius: 4px 0 0 0;
}
.panel-table > .panel-heading > .tr > .td:last-child {
    border-radius: 0 4px 0 0;
}
.panel-table > .panel-footer > .tr > .td:first-child {
    border-radius: 0 0 0 4px;
}
.panel-table > .panel-footer > .tr > .td:last-child {
    border-radius: 0 0 4px 0;
}
.form-control{
    background: transparent;
}
form {
	width: 100%;
	margin: 20px;
}
form > div {
	position: relative;
	overflow: hidden;
}
form input, form textarea {
	width: 100%;
	border: 2px solid gray;
	background: none;
	position: relative;
	top: 0;
	left: 0;
	z-index: 1;
	padding: 8px 12px;
	outline: 0;
}
form input:valid, form textarea:valid {
	background: white;
}
form input:focus, form textarea:focus {
	border-color: rgba(60, 122, 177, 0.295);
}
form input:focus + label, form textarea:focus + label {
	background: rgba(28, 132, 223, 0.623);
	color: white;
	font-size: 70%;
	padding: 1px 6px;
	z-index: 2;
	text-transform: uppercase;
}
form label {
	-webkit-transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	position: absolute;
	color: rgb(20, 165, 20);
	padding: 7px 6px;
	font-weight: normal;
}
form textarea {
	display: block;
	resize: vertical;
}
form.go-bottom input, form.go-bottom textarea {
	padding: 12px 12px 12px 12px;
}
form.go-bottom label {
	top: 0;
	bottom: 0;
	left: 0;
	width: 100%;
}
form.go-bottom input:focus, form.go-bottom textarea:focus {
	padding: 4px 6px 20px 6px;
}
form.go-bottom input:focus + label, form.go-bottom textarea:focus + label {
	top: 100%;
	margin-top: -16px;
}
form.go-right label {
	border-radius: 0 5px 5px 0;
	height: 100%;
	top: 0;
	right: 100%;
	width: 100%;
	margin-right: -100%;
}
form.go-right input:focus + label, form.go-right textarea:focus + label {
	right: 0;
	margin-right: 0;
	width: 20%;
	padding-top: 5px;
}
.div-error{
    display: flex;
    justify-content: center;
}
.text-error{
    color:red!important;
    font-weight: bold!important;
}
.panel-table{
    width: 100%!important;
}
.hiden{
    display:none;
}
.nohiden{
    display:table-cell!important;
}

</style>

