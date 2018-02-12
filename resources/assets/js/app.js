import Vue from 'vue';
import InstantSearch from 'vue-instantsearch';
import Tabs from 'vue-tabs-component';


window.Vue = require('vue');

Vue.use(InstantSearch);
Vue.use(Tabs);

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

