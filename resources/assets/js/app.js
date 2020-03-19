require('./bootstrap')
window.Vue = require('vue')

import router from './router'
import store from './store'
import Api from './helpers/api.js'
import Auth from './helpers/auth.js'
import {
  iconsSet as icons
} from './icons/icons.js'

window.api = new Api()
window.auth = new Auth()


//3rd vue components
require('./vendor_components')

//Own App components
require('./vue_components')

//Functions Utilities & Filters
require('./utilities')

const app = new Vue({
  el: '#app',
  icons,
  router,
  store,
  beforeCreate() {
    Vue.$snotify = this.$snotify;
  },
})
