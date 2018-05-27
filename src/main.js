// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import App from './App'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import './assets/css/app.less'
Vue.config.productionTip = false

/* eslint-disable no-new */







Vue.use(VueI18n)
Vue.use(VueAxios, axios)


const messages = {
    en: {
        footer: {
            phone: 'Phone',
            email: 'Email'
        },
        socialImg : '"../assets/img/social-txt.svg"',
        form:{
            request : 'SEE',
            service : 'MORE',
            name:'Name',
            phone :'Phone',
            email:'Email',
            send:'SEND',
            message : "Register your data and participate for a dent repair raffle for your car.",
        }
    },
    es: {
          footer: {
            phone: 'Teléfono',
            email: 'Correo'
        },
        socialImg : '"../assets/img/social-txt.svg"',
        form:{
            request : 'CONOCER',
            service : 'MÁS',
            name:'Nombre',
            phone :'Teléfono',
            email:'Correo',
            send:'ENVIAR',
            message : 'Registre sus datos y participe por el sorteo de un arreglo de su camanance',
        }
        
    }
}



// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: 'es', // set locale
    messages, // set locale messages
})


new Vue({
    el: '#app',
    router,
    i18n,
    components: {
        App
    },
    template: '<App/>'
})
