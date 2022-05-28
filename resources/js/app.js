
import '../css/app.css'
import Download from './views/Download'
import HomeComponent from './views/Home'

import VueRouter from 'vue-router'
import Vue from 'vue'
import AboutVue from './views/About.vue'
import ContactVue from './views/Contact.vue'
import BlogVue from './views/Blog.vue'
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
        {
            path: '/about',
            name: 'About',
            component: AboutVue,
        },
        {
            path: '/contact',
            name: 'Contact',
            component: ContactVue,
        },
        {
            path: '/blog',
            name: 'Blog',
            component: BlogVue,
        },
    ],
});

window.Vue = require('vue').default;

Vue.component('App', require('./views/App.vue').default);

const app = new Vue({
    el: '#app',
    router
});
