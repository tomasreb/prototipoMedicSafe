<template>
    <main class="main">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Paciente</li>
        <li class="breadcrumb-item active">Mi historia clinica</li>
    </ol>
        <div class="container" id="julietaprandi">

        <div class="row-fluid user-infos cyruxx">
            <div class=" col col-md-12"> <a  class="btn btn-info d-block botonsito" @click="descargar()"><i class="icon-printer"></i> Descargar</a></div>
            <div class="span10 offset1">
                <div class="panel panel-primary">

                    <div class="panel-heading bg-info">
                       <p> <h3>Datos del paciente </h3> <strong v-text="usuario.name"></strong>
                        <h3 class="panel-title"><span>fecha de creacion : </span><span v-text="historia.created_at"></span> </h3>

                    </div>
                    <div class="panel-body">
                        <div class="row-fluid">

                            <div class="span6">

                                <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>
                                    <tr>

                                        <td>Dni</td>
                                        <td v-text="usuario.dni"></td>
                                    </tr>
                                    <tr>
                                        <td>Telefono celular</td>
                                        <td v-text="usuario.tel_cel"></td>
                                    </tr>
                                    <tr>
                                        <td >Telefono fijo</td>
                                        <td v-text="usuario.tel_fijo"></td>
                                    </tr>
                                    <tr>
                                        <td >E-mail</td>
                                        <td v-text="usuario.email"></td>
                                    </tr>
                                    <tr>
                                        <td >Direccion</td>
                                        <td v-text="usuario.direccion"></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- datos cronicos del paciente -->
        <div class="row-fluid user-infos cyruxx">
            <div class="span10 offset1">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-info">
                       <p> <h3>Datos Cronicos del paciente</h3> <strong v-text="usuario.name"></strong>
                        <h3 class="panel-title"><span>fecha de ultima modificacion </span><span v-text="historia.updated_at"></span> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row-fluid">

                            <div class="span6">

                                <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>
                                    <tr>

                                        <td>Grupo sanguineo</td>
                                        <td v-text="historia.grupo_sanguineo"></td>
                                    </tr>
                                    <tr>
                                        <td>Cardiopatias</td>
                                        <td v-text="historia.cardiopatias"></td>
                                    </tr>
                                    <tr>
                                        <td >Alcoholismo</td>
                                        <td v-text="historia.alcoholismo"></td>
                                    </tr>
                                    <tr>
                                        <td >diabetes</td>
                                        <td v-text="historia.diabetes"></td>
                                    </tr>
                                    <tr>
                                        <td >Tatuajes</td>
                                        <td v-text="historia.tatuajes"></td>
                                    </tr>
                                    <tr>
                                        <td >Vih</td>
                                        <td v-text="historia.vih"></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- partes medicos asociados al paciente  -->
        <div class="row-fluid user-infos cyruxx">
            <div class="span10 offset1">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-info">
                       <p> <h3>Partes medicos asociados al paciente </h3><strong v-text="usuario.name"></strong>
                        <h3 class="panel-title"><span>Numero de identificacion de historia clinica : </span><span v-text="historia.id"></span> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row-fluid">

                            <div class="span6"  v-for="(profesional, indice) in profesional" :key="indice">
                                <div class="card-block">
                                    <div class="card-title bg-danger" > <strong>fecha de atencion :</strong> <b v-text="diagnostico[indice].created_at" ></b> <strong>Identificador de parte : </strong> <b v-text="diagnostico[indice].id"></b> </div>
                                 <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>
                                   <tr>
                                <td>
                                    <b class="bg-secondary">Informacion personal del profesional:</b>


                                </td>
                            </tr>
                            <tr><td>Nombre: </td>
                            <td v-text="profesional.name"></td></tr>
                            <td>Matricula: </td>
                            <td v-text="profesional.matricula" ></td>
                            <tr>
                                <td>telefono celular:</td>
                                <td v-text="profesional.tel_cel" ></td>
                            </tr>
                            <tr>
                            <td>
                             Especialidad:
                            </td>
                            <td v-text="profesional.specialty" >
                            </td>
                            </tr>
                            <tr class="primaria">
                                <td > <b>Datos de consulta: </b> </td> <td></td></tr>
                                <tr><td>Motivo de consulta: </td>
                                <td v-text="diagnostico[indice].motivo" ></td></tr>
                                <tr><td>Lugar de atencion: </td>
                                <td v-text="diagnostico[indice].lugar_atencion" ></td></tr>
                                <tr class="bg-secondary">
                                <td >Sintomas: </td>
                                <td v-text="diagnostico[indice].sintomas" ></td>
                                </tr>
                                <tr class="bg-secondary">
                                    <td>Enfermedad Actual:</td>
                                    <td v-text="diagnostico[indice].enfermedad_actual" ></td>
                                </tr>
                                <tr class="bg-secondary">
                                    <td>Tratamiento solicitado:</td>
                                    <td v-text="diagnostico[indice].tratamiento" ></td>
                                </tr>
                                <tr>

                                    <td>Se cargaron estudios</td>
                                    <div v-if="diagnostico[indice].solicito_estudios == 'SI' ">
                                    <td><button class="btn btn-success" @click="verEstudio(diagnostico[indice].id)"> VER </button>


                                    </td>
                                   </div>
                                   <div v-else> <td>NO SOLICITO NINGUN ESTUDIO</td></div>
                                </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn  btn-primary" type="button"
                            data-toggle="tooltip"
                            data-original-title="Send message to user"><i class="icon-envelope icon-white"> <span style="color:black;"> enviar al e-mail</span> </i></button>
                    <span class="pull-right">
                        <button class="btn btn-info" type="button"
                                ></button>
                        <button class="btn" style="background-color:#A5CD39!important;" type="button"

                                ></button>
                    </span>
                </div>
            </div>




























        <!-- fin -->







        </div>
    </main>
</template>


<script>
    export default {
        data(){
            return{
                usuario : '',
                medicos : '',
                historia : '',
                partes : '',
                diagnostico : '',
                profesional : '',
                estudio : [],


           }
        },
        methods : {
            datosuser(){
                 let me=this;


                 axios.get('home/quien').then(function(response){
                     var resultado = response.data
                     me.usuario = resultado.usuario;
                     me.medicos = me.usuario.medics;
                     me.historia = me.usuario.history;
                     me.partes = me.usuario.history.parts;




                })
             },
             diagnosticos(){
                 let me=this;


                 axios.get('home/diagnosticos').then(function(response){
                     var respuesta = response.data;
                    //  me.usuario = respuesta.usuario;
                         me.diagnostico = respuesta.diagnostico
                         me.profesional = respuesta.profesional






                })
             },
             verEstudio(id,){
                 let me=this;
                 axios.post('home/estudios' , {'id':id}).then(function(response){
                    me.estudio = response.data;
                    swal({

                    title: me.estudio[0].name,

                    text: me.estudio[0].informe,
                    imageUrl: me.estudio[0].ruta_imagen,
                    imageWidth: 600,
                    imageHeight: 300,

                    animation: true


                    });


                 });




             },
             descargar(){
                 let me =this;
                 var doc = new jsPDF();


                 doc.text(20,20, 'bueno deberia ir aca el reporte del tipo lo dejo para lo ultimo');



                 doc.save('test.pdf');
             }

        },

        mounted()  {


            this.datosuser();
            this.diagnosticos();

        }
     }
</script>
<style>




.panel {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
    margin-top: 20px!important;
}

.panel-primary {
    border-color: #428BCA;
}

.panel-primary > .panel-heading {
    background-color: #428BCA;
    border-color: #428BCA;
    color: black;
}

.panel-heading {
    border-bottom: 1px solid rgba(0, 0, 0, 0);
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    padding: 10px 15px;
}

.panel-title {
    font-size: 16px;
    margin-bottom: 0;
    margin-top: 0;
}

.panel-body:before, .panel-body:after {
    content: " ";
    display: table;
}

.panel-body:before, .panel-body:after {
    content: " ";
    display: table;
}

.panel-body:after {
    clear: both;
}

.panel-body {
    padding: 15px;
}

.panel-footer {
    background-color: #F5F5F5;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border-top: 1px solid #DDDDDD;
    padding: 10px 15px;
}

.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.primaria{
    background-color:#A5CD39
}
.botonsito{


    border-radius:25px;
    margin-top:15px!important;

}
</style>

