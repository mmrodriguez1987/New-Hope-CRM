import router from './router'

import store from './store'

require('./bootstrap');

Vue.router = router
//window.Vue = require('vue')

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
