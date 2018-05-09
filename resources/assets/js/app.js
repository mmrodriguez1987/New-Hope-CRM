import store from './store'
import router from './router';
import BootstrapVue from 'bootstrap-vue';
import _ from 'lodash'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('userEdit', require('./components/user/Edit.vue'));

//3rd components
Vue.use(BootstrapVue);

//Localization
Vue.prototype.trans = string => _.get(window.i18n, string);
window.trans = string => _.get(window.i18n, string);

window.clone = function (obj) {
    return JSON.parse(JSON.stringify(obj))
}


const app = new Vue({
    el: '#app',
    router,
    store,
});
