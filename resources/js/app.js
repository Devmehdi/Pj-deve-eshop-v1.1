require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('register-component',require('./components/Auth/RegisterComponent.vue').default);

const app = new Vue({
    el: '#app'
});