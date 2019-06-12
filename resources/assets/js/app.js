//import './polyfill'
import router from './router'
import store from './store'


require('./bootstrap');
window.Vue = require('vue');

//3rd vue components
require('./vendor_components')

//Own App components
require('./vue_components')

//Functions Utilities & Filters
require('./utilities.js')

new Vue({
  el: '#app',
  router,
  store
})
