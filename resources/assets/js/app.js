import Vue from 'vue';
import VueRouter from 'vue-router';
import VueMeta from 'vue-meta';
import JobContent from './components/JobContent';

const routes = [
    {
        path: '/job/:id',
        component: JobContent
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.use(VueRouter);
Vue.use(VueMeta);

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('job', require('./components/Job.vue'));

const app = new Vue({
    el: '#app',
    router
});
