// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
Vue.component('notebooks', require('./components/Notebook.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

// Initialize Vue
const app = new Vue({
    el: '#app',
});
