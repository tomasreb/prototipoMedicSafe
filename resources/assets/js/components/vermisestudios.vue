<template>
    <main class="main">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Paciente</li>
        <li class="breadcrumb-item active">Mis estudios</li>
    </ol>
        <div class="container-fluid">
            <div class="row" style="margin-top:25px!important;" >
		        <div class="col-sm-4" v-for="(estudios, indice) in estudios" :key="indice">
		             <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <img class="img-fluid" v-bind:src= estudios.ruta_imagen>

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title" v-text="estudios.name"></h4>
                            <!--Text-->
                                <p class="card-text" v-text="estudios.informe"></p>
                                <a href="#" class="btn btn-primary" @click="verinforme(indice )">ver más</a>

                        </div>

                    </div>
            <!--/.Card-->

		     </div>


	        </div>



        </div>
    </main>
</template>



<script>
    export default {
        data(){
            return{
                estudios: '',
                partes: '',


           }
        },
        methods : {
            partesConEstudios(){
                let me=this;
                axios.get('home/verpartesconestudios').then(function(response){
                    var respuesta = response.data
                    me.partes = respuesta.partes
                    me.estudios = respuesta.estudios
                });
            },
            verinforme(indice){
                let me=this;
                     swal({

                    title: me.estudios[indice].name,

                    text: me.estudios[indice].informe,
                    imageUrl: me.estudios[indice].ruta_imagen,
                    imageWidth: 600,
                    imageHeight: 300,

                    animation: false


                    });

            }
        },

        mounted()  {

            this.partesConEstudios();


        }
     }
</script>
