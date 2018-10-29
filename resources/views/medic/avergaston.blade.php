{{--  <template>
        <main class="main">
            <div class="container">


            <div id="cuerpollo">

                <section id="banner">
                        <div class="content">
                            <header>
                                <h2>Sistema Medicsafe. </h2>
                                <p>Tu salud, Tu historia y Tus medicos en una sola aplicacion.<br />
                                </p>
                            </header>
                            <span class="image"></span>
                        </div>

                    </section>
                   </div>




            </div>
        </main>
    </template>



    <script>
        export default {
            data(){
                return{
                    medico : '',


               }
            },

            methods : {
                 datosuser(){
                     let me=this;


                     axios.get('home/quien').then(function(response){
                         me.medico = response.data;



                    })
                 },

            },

            mounted()  {
                this.datosuser();


            }
         }
    </script>
  --}}
