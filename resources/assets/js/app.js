
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('medicos', require('./components/medicos.vue'));
Vue.component('profile', require('./components/profile.vue'));
Vue.component('diagnosticos', require('./components/diagnosticos.vue'));
Vue.component('acercade', require('./components/acercade.vue'));
Vue.component('historia', require('./components/historia.vue'));
Vue.component('turnos', require('./components/turnos.vue'));
Vue.component('vermisestudios', require('./components/vermisestudios.vue'));
Vue.component('perfilmedico', require('./componentsmedic/perfilmedico.vue'));
Vue.component('mispacientes', require('./componentsmedic/mispacientes.vue'));
Vue.component('misdiagnosticos', require('./componentsmedic/misdiagnosticos.vue'));
Vue.component('agregarpaciente', require('./componentsmedic/agregarpaciente.vue'));



const app = new Vue({
    el: '#app',


    data:{
        menu : 0,


    },



});










