import store from './store'
import router from './router';

require('./bootstrap');
window.Vue = require('vue');

//3rd vue components
require('./vendor_components')

//Own App components
require('./vue_components')

//Functions Utilities & Filters
require('./utilities.js')

window.moment = require('moment');

const app = new Vue({
  el: '#app',
  router,
  store,
})
