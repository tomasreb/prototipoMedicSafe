<template>
    <main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Profesional</li>
        <li class="breadcrumb-item active">Mi perfil</li>
    </ol>
        <div class="container-fluid">


	<div class="row" style="margin-top:20px!important;">
        <div class="col-md-4">


         <figure id="">


            <img class="img img-responsive"  v-bind:src= medico.img_profile>

          </figure>
          </div>
        <div class="col-md-8">
            <ul class="list-group">
            <strong> <li class="list-group-item" v-text="medico.name"></li></strong>

            <li class="list-group-item"><i class="fa fa-home fa-2x"></i> <strong>Direccion : </strong> <span v-text="medico.name"></span> </li>
            <li class="list-group-item"><i class="fa fa-phone fa-2x"></i> <strong>Telefono fijo : </strong> <span v-text="medico.tel_fijo"></span> </li>
            <li class="list-group-item"><i class="fa fa-mobile fa-2x"></i> <strong>Telefono celular : </strong> <span v-text="medico.tel_fijo"></span> </li>
            <li class="list-group-item"><i class="icon-envelope  fa-2x"></i> <strong>E-mail : </strong> <span v-text="medico.email"></span> </li>
            <li class="list-group-item"><i class="fa fa-stethoscope fa-2x"></i> <strong>Especialidad : </strong> <span v-text="medico.specialty"></span> </li>

            </ul>
        </div>






        <!-- resume -->

    </div>
    <div class="row" style="margin-top:10px!important; margin-bottom:10px!important;">
	    <br/>




	</div>
		<div class="row text-center"  style="margin-top:10px!important; margin-bottom:30px!important;">
                <div class="col-md-3 ">
                    <div class="counter">
                        <i class="icon-pin fa-4x"></i>
                        <h2 class="timer count-title count-number" v-text="medico.parts.length" ></h2>
                        <p class="count-text ">Partes medicos que firme</p>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="counter">
                        <i class="icon-like fa-4x"></i>
                        <h2 class="timer count-title count-number" v-text="medico.users.length" ></h2>
                        <p class="count-text ">Cantidad de pacientes</p>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="counter">
                        <i class="icon-book-open  fa-4x"></i>
                        <h2 class="timer count-title count-number" v-text="estudios.length" ></h2>
                        <p class="count-text ">Estudios que realicé</p>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="counter">
                        <i class="icon-speech fa-4x"></i>
                        <h2 class="timer count-title count-number" v-text="medico.parts.length" ></h2>
                        <p class="count-text ">Veces que me derivaron</p>
                    </div>
                </div>



         </div>
         <div class="row" style="margin:20px 0px 20px 0px!important;">
            <div class="col-md-12 "><button class="btn btn-block btn-success">Modificar perfil</button></div>

        </div>





        </div>
    </main>
</template>



<script>
    export default {
        data(){
            return{
                medico : '',
                estudios : '',


           }
        },


        methods : {
             datosuser(){
                 let me=this;


                 axios.get('medic/quiensoy').then(function(response){
                    var respuesta = response.data
                     me.medico = respuesta.medico;
                     me.estudios = respuesta.estudios;



                })
             },

        },

        mounted()  {
            this.datosuser();


        }
     }


</script>
<style>


.counter {
    background-color:#f5f5f5;
    padding: 20px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 60px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.fa-4x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}

</style>


