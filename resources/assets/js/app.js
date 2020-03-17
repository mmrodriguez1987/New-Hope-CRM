// require('./bootstrap')

// import router from './router'
// import store from './store'
// import CoreuiVue from '@coreui/vue'
// import {
//   iconsSet as icons
// } from './icons/icons.js'


// require('./bootstrap');

// Vue.use(CoreuiVue)
// // Set Vue globally
// window.Vue = require('vue');

// //3rd vue components
// require('./vendor_components')

// //Own App components
// require('./vue_components')

// //Functions Utilities & Filters
// require('./utilities.js')

// new Vue({
//   el: '#app',
//   icons,
//   router,
//   store
// })
require('./bootstrap')


import router from './router'
import store from './store'
import Api from './helpers/api.js'
import Auth from './helpers/auth.js'
import {
  iconsSet as icons
} from './icons/icons.js'

window.api = new Api()
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
  icons,
  router,
  store,
  beforeCreate() {
    Vue.$snotify = this.$snotify;
  },
})
