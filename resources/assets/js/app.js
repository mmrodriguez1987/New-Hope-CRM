//import './polyfill'
import router from './router'
import store from './store'
import CoreuiVue from '@coreui/vue'
import {
  iconsSet as icons
} from './icons/icons.js'


require('./bootstrap');

Vue.use(CoreuiVue)
// Set Vue globally
window.Vue = require('vue');

//3rd vue components
require('./vendor_components')

//Own App components
require('./vue_components')

//Functions Utilities & Filters
require('./utilities.js')

new Vue({
  el: '#app',
  icons,
  router,
  store
})
