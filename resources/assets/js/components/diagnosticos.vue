<template>
    <main class="main">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Paciente</li>
        <li class="breadcrumb-item active">mis diagnosticos</li>
    </ol>

<div class="container">
<template>

    <div class="row"  v-for="(profesional, indice) in profesional" :key="indice">
        <div class="card col-md-12 p-3" >
    		<div class="row ">
    			<div class="col-md-2">
    				<img class="w-100 h-70 imagen" v-bind:src= profesional.img_profile>

    			</div>
    			<div class="col-md-10">
    				<div class="card-block">
                        <div class="card-title" > <strong>fecha de atencion :</strong> <b v-text="diagnostico[indice].created_at" ></b> </div>
                        <table class="table-responsive table-user-information">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Informacion personal del profesional:</b>


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
                            <tr>
                                <td> <b>Datos de consulta: </b> </td> <td></td></tr>
                                <tr><td>Motivo de consulta: </td>
                                <td v-text="diagnostico[indice].motivo" ></td></tr>
                                <tr>
                                <td>Sintomas: </td>
                                <td v-text="diagnostico[indice].sintomas" ></td>
                                </tr>
                                <tr>
                                    <td>Enfermedad Actual:</td>
                                    <td v-text="diagnostico[indice].enfermedad_actual" ></td>
                                </tr>
                                <tr>
                                    <td>Tratamiento solicitado:</td>
                                    <td v-text="diagnostico[indice].tratamiento" ></td>
                                </tr>
                                <tr>

                                    <td>Estudios</td>
                                    <div v-if="diagnostico[indice].solicito_estudios == 'SI' ">
                                    <td>  <button class="btn btn-success" @click="verEstudio(diagnostico[indice].id)"> VER ESTUDIOS </button>


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
                // usuario : '',
                diagnostico : '',
                profesional : '',
                estudio : [],



           }
        },
        methods : {
             datosuser(){
                 let me=this;


                 axios.get('home/diagnosticos').then(function(response){
                     var respuesta = response.data;
                    //  me.usuario = respuesta.usuario;
                         me.diagnostico = respuesta.diagnostico
                         me.profesional = respuesta.profesional






                })
             },
             verEstudio(id){
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



        },

        mounted()  {
            this.datosuser();



        }
     }


</script>



<style>
.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.imagen{
    max-width: 250px!important;
    max-height: 250px!important;
}
</style>
