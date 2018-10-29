<template>
    <main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Profesional</li>
        <li class="breadcrumb-item active">Asociar paciente</li>
    </ol>
        <div class="container" style="margin-top:25px!important;">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="elpapastone">
                        <video id="preview" class="card-img-top"></video>
                        <div class="card-body">
                            <h5 class="card-title">Acerque el codigo qr de su paciente dentro de los margenes de esta pantalla</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="container" style="margin-top:25px!important;">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="elpapastone">

                        <div class="card-body">
                            <a @click="agregarManual()" class="btn btn-success btn-block"> Si no se abre el lector presione aqui para agregar el paciente de forma manual</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </main>
</template>



<script>
    export default {
           data(){
            return{
                pajero : 0 ,
                paciente :'',
           }
        },
        mounted: function(){
            this.onInitialOpenCamera();
        },
        methods :{
            onInitialOpenCamera(){
                let me = this;
                let scanner = new Instascan.Scanner({video : document.getElementById('preview'), mirror: true,});
                scanner.addListener('scan', function (content) {
                    me.pajero = content;
                    // alert(me.pajero)
                    me.asociar();
                    scanner.stop().then(function(){
                        alert('scaner stoped')
                    });




                });
                Instascan.Camera.getCameras().then(function(cameras){
                    if(cameras.length <= 0 ) return alert('not found camera.');
                    scanner.start(cameras[0]);
                }).catch(error => alert(error));
            },
            asociar(){
             let me = this;
            axios.post('medic/paciente',{'id' : 123456} ).then(function(response){

                        me.paciente = response.data;
                        let timerInterval
                        swal({
                        title: 'Asociando paciente, aguarda unos segundos',
                        html: 'Agregando paciente <strong></strong>.',
                        timer: 2000,
                        onOpen: () => {
                            swal.showLoading()
                            timerInterval = setInterval(() => {
                            swal.getContent().querySelector('strong')
                                .textContent = 'Asociando'
                            }, 100)

                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                            swal({
                                type: 'success',
                                title: 'has asociado con exito a <br> ' + me.paciente[0].name ,
                                text: 'checkea tus pacientes para ver su historial',

                                });

                        if (
                            // Read more about handling dismissals
                            result.dismiss === swal.DismissReason.timer
                        ) {
                            console.log('soy re heavy re jodido y me cierro cuando quiero')
                        }
                        }),
                        me.pajero = 0;
                });

            },




            agregarManual(){
                alert('manual');
            }
        },


     }
</script>
<style>
#elpapastone{

-webkit-animation:bounce-in 2s ease-in-out 0s 1 normal;
-moz-animation:bounce-in 2s ease-in-out 0s 1 normal;
-ms-animation:bounce-in 2s ease-in-out 0s 1 normal;
animation:bounce-in 2s ease-in-out 0s 1 normal;

}

@-webkit-keyframes bounce-in {
0%{ opacity: 0; -webkit-transform: scale(.3); transform: scale(.3); }
50%{ opacity: 1; -webkit-transform: scale(1.0); transform: scale(1.0); }
70%{ -webkit-transform: scale(0.9); transform: scale(0.9); }
100%{ -webkit-transform: scale(1); transform: scale(1); }
}

@keyframes bounce-in {
0%{ opacity: 0; transform: scale(.3); }
50%{ opacity: 1; transform: scale(1.0); }
70%{ transform: scale(0.9); }
100%{ transform: scale(1); }
}

</style>

