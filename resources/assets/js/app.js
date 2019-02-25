import router from './router';
import store from './store'
import App from './components/App'

require('./bootstrap');
window.Vue = require('vue');

//3rd vue components
require('./vendor_components')

//Own App components
require('./vue_components')

//Functions Utilities & Filters
require('./utilities.js')

const app = new Vue({
  el: '#app',
  router,
  store,
  template: '<App/>',
  components: {
    App
  }
})
