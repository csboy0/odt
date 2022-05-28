
import '../css/app.css'
import Download from './views/Download'
import HomeComponent from './views/Home'

import VueRouter from 'vue-router'
import Vue from 'vue'
require('./bootstrap');
Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/download',
            name: 'Download',
            component: Download,
        },
    ],
});

window.Vue = require('vue').default;

Vue.component('App', require('./views/App.vue').default);

const app = new Vue({
    el: '#app',
    router
});
