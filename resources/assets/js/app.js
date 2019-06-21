import router from './router'
import store from './store'
import auth from './auth.js';

require('./bootstrap');

window.auth = auth;
window.Vue = require('vue');

Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('csrf_token').value;

Vue.router = router

//3rd vue components
require('./vendor_components')

//Own App components
require('./vue_components')

//Functions Utilities & Filters
require('./utilities')

const app = new Vue({
  el: '#app',
  router,
 store
})
