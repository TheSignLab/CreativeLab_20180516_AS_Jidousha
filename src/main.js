// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import App from './App'
import router from './router'
import './assets/css/app.less'
Vue.config.productionTip = false

/* eslint-disable no-new */







Vue.use(VueI18n)

const messages = {
    en: {
        footer: {
            phone: 'Phone',
            email: 'Email'
        },
        form:{
            request : 'request',
            service : 'service',
            name:'name',
            phone :'phone',
            email:'email'
        }
    },
    es: {
          footer: {
            phone: 'Teléfono',
            email: 'Correo'
        },
        form:{
            request : 'solicitar',
            service : 'servicio',
            name:'nombre',
            phone :'teléfono',
            email:'correo'
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
