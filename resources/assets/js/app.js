require('./bootstrap')

import router from './router'
import store from './store'

import Api from './api.js'
window.api = new Api()

import Auth from './auth.js'
window.auth = new Auth()

window.Event = new Vue

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
