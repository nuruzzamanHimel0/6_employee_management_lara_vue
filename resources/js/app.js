
require('./bootstrap');

window.Vue = require('vue').default;

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('employees-index', require('./components/employees/index.vue').default);

// ## laravel Router Install ##
import {routes} from './router.js'

import VueRouter from 'vue-router'
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes: routes,
    // linkActiveClass: "active",
});




const app = new Vue({
    el: '#app',
    router
});
