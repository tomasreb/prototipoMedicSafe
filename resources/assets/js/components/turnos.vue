<template>
    <main class="main">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Paciente</li>
        <li class="breadcrumb-item active">Pedir turnos</li>
    </ol>
        <div class="container-fluid">

            <div class="form-group row" style="margin-top:20px!important;">
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

            <div  class="row" style="margin-top:20px!important;" >
                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" v-for="medico in arrayMedicos" :key="medico">
                    <!-- team-img -->
                    <div class="team-block">
                        <div class="team-img">
                            <img v-bind:src= medico.img_profile alt="">
                            <div class="team-content" >
                                <h5 class="text mb0" v-text="medico.name" ></h5>

                            </div>
                            <div class="overlay" >
                                <div class="text">
                                    <h4 class="mb0 " v-text="medico.name" > </h4>
                                    <p class="mb30 team-meta" v-text="medico.specialty"></p>
                                    <button class="btn btn-default" @click="pavear()">pedir turno</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </main>
</template>



<script>
   export default {
        data(){
            return{


                arrayMedicos: [],

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
            listarMedicos(page , buscar , criterio){
                let me=this;

                var url =  'home/todoslosmedicos?page=' + page +'&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function(response){
                    var respuesta = response.data;
                    me.arrayMedicos = respuesta.medicos.data;
                    me.pagination = respuesta.pagination;


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

        },

        mounted() {
            this.listarMedicos(1, this.buscar, this.criterio);


        }
    }

</script>

<style>
.mb40{margin-bottom:40px;}
.team-block { margin-bottom: 20px; }
.team-content { position: absolute; background-color: rgba(25, 121, 216, 0.623); bottom: 0px; display: inline-block; width: 100%; color: black; padding: 30px; }
.team-img { position: relative; }
.team-img img { width: 100%; }

.team-meta { color: black; font-weight: 800; font-size: 18px; }
.overlay { border-radius: 0px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; width: 100%; opacity: 0; transition: 1s ease; background-color: #0a922148; }
.team-img:hover .overlay { opacity: .8; }
.team-img:hover .team-content { opacity: 0; }
.text { color: black; position: absolute; top: 30%; left: 30%; transform: translate(-26%, -26%); -ms-transform: translate(-26%, -26%); right: 0; font-weight: 800; font-size: 18px; }

</style>
