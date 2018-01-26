import Vue from 'vue';
import NavBar from './components/NavBar';

// window.EventBus = new Vue();
window.Vue = require('vue');

Vue.prototype.EventBus = new Vue({});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('nav-bar', require('./components/NavBar.vue'));
Vue.component('search-bar', require('./components/SearchBar.vue'));

const app = new Vue({
    el: '#app',
    methods: {
        toggle() {
            console.log('searching')
        }
    }
});

