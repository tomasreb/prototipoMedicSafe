<template>


<main class="main">
     <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Paciente</li>
        <li class="breadcrumb-item active">Mi perfil</li>
    </ol>
    <div class="container-fluid" style="margin-top:25px!important;">

    <div class="row" >
        <div class="col-md-4">


         <figure id="">


            <img class="img img-responsive" style="min-width:200px!important; min-height:200px!important" v-bind:src= usuario.profile_image>

          </figure>
          </div>
        <div class="col-md-8">
            <ul class="list-group">
            <strong> <li class="list-group-item" v-text="usuario.name"></li></strong>

            <li class="list-group-item"><i class="fa fa-home"></i> <strong>Direccion : </strong> <span v-text="usuario.direccion"></span> </li>
            <li class="list-group-item"><i class="fa fa-phone"></i> <strong>Telefono fijo : </strong> <span v-text="usuario.tel_fijo"></span> </li>
            <li class="list-group-item"><i class="fa fa-mobile"></i> <strong>Telefono celular : </strong> <span v-text="usuario.tel_fijo"></span> </li>
            <li class="list-group-item"><i class="icon-envelope"></i> <strong>E-mail : </strong> <span v-text="usuario.email"></span> </li>

            </ul>
        </div>






        <!-- resume -->

    </div>



    <div class="row" style="margin-top:25px!important;">
        <div class="col-md-4">
        <div class="card-counter info">
            <i class="fa fa-users"></i>
            <div v-if="usuario.medics == '' ">
                <span class="count-numbers" v-text="0"></span>
            <span class="count-name">Profesionales</span>
            </div>
            <div v-else>
                <span class="count-numbers" v-text="usuario.medics.length"></span>
            <span class="count-name">Profesionales</span>
            </div>


        </div>
        </div>

        <!-- segunda  -->
        <div class="col-md-4">
        <div class="card-counter danger">
            <i class="fa fa-ticket"></i>
            <div v-if="usuario.history == null ">
                <span class="count-numbers" v-text="0"></span>
                <span class="count-name">diagnosticos</span>
            </div>
            <div v-else>
                <span class="count-numbers" v-text="usuario.history.parts.length"></span>
                <span class="count-name">diagnosticos</span>
            </div>


        </div>
        </div>
        <!-- tercera -->



        <div class="col-md-4">
        <div class="card-counter success">
            <i class="fa fa-database"></i>
            <span class="count-numbers" v-text="usuario.history.parts.length"></span>
            <span class="count-name">Estudios</span>
        </div>
        </div>


    </div>
    <div class="row" style="margin:50px 0px 50px 0px!important;">
            <div class="col-md-12 "><button class="btn btn-block btn-success">Modificar perfil</button></div>

        </div>
</div>

</main>
</template>








<script>

     export default {
        data(){
            return{
                usuario : '',

           }
        },
        methods : {
             datosuser(){
                 let me=this;


                 axios.get('home/quien').then(function(response){
                     me.usuario = response.data.usuario;



                })
             },

        },

        mounted()  {
            this.datosuser();


        }
     }
</script>

