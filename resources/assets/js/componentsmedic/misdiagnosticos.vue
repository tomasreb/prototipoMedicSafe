<template>
    <main class="main">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Profesional</li>
        <li class="breadcrumb-item active">Mis diagnosticos</li>
    </ol>
        <div class="container">

           <template>
    <div class="row"  v-for="(parte, indice) in partes" :key="indice">
        <div class="card col-md-12 p-3" >
    		<div class="row ">
    			<div class="col-md-2">
    				<img class="w-100 h-70 imagen" v-bind:src= paciente[indice].profile_image>

    			</div>
    			<div class="col-md-10">
    				<div class="card-block">
                        <div class="card-title" > <strong>fecha de atencion :</strong> <b v-text="parte.created_at" ></b> </div>
                        <div class="card-title" > <strong>fecha de atencion :</strong> <b v-text="paciente[indice].name" ></b> </div>
                        <table class="table-responsive table-user-information">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Informacion personal del parte medico:</b>


                                </td>
                            </tr>


                            <tr>
                                <td> <b>Datos de consulta: </b> </td> <td></td>
                            </tr>
                                <tr>
                                    <td>Motivo de consulta: </td>
                                    <td v-text="parte.motivo" ></td>
                                </tr>
                                <tr>
                                <td>Sintomas: </td>
                                <td v-text="parte.sintomas" ></td>
                                </tr>
                                <tr>
                                    <td>Enfermedad Actual:</td>
                                    <td v-text="parte.enfermedad_actual" ></td>
                                </tr>
                                <tr>
                                    <td>Diagnostico:</td>
                                    <td v-text="parte.diagnostico" ></td>
                                </tr>
                                <tr>
                                    <td>Tratamiento solicitado:</td>
                                    <td v-text="parte.tratamiento" ></td>
                                </tr>
                                <tr>
                                    <td>Lugar de atencion:</td>
                                    <td v-text="parte.lugar_atencion" ></td>
                                </tr>
                                <tr>

                                    <td>Estudios</td>
                                    <div v-if="parte.solicito_estudios == 'SI' ">
                                    <td>  <a class="btn btn-success"  @click="verEstudio(indice)"> VER ESTUDIOS </a>


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
</template>




        </div>
    </main>
</template>



<script>
    export default {
        data(){
            return{
                medico : '',
                partes : '',
                paciente : '',
                estudios :'',


           }
        },

        methods : {
             datosuser(){
                 let me=this;


                 axios.get('medic/misdiagnosticos').then(function(response){
                     var respuesta = response.data
                     me.medico  = respuesta.medico;
                     me.partes  = respuesta.partes.reverse();
                     me.paciente  = respuesta.paciente.reverse();
                     me.estudios = respuesta.estudios.reverse();


                })
             },
             verEstudio(position){
                 let me = this;

             swal({

                    title: me.estudios[position].name,

                    text: me.estudios[position].informe,

                    imageUrl: me.estudios[position].ruta_imagen,
                    imageWidth: 600,
                    imageHeight: 300,

                    animation: true


                    });

             },


        },

        mounted()  {
            this.datosuser();


        }
     }
</script>

