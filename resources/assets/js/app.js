import store from './store'
import router from './router';
import BootstrapVue from 'bootstrap-vue';
import vSelect from 'vue-select'
import _ from 'lodash'
import wysiwyg from "vue-wysiwyg"
import DatePicker from 'vuejs-datepicker'
import VueLoading from 'vuex-loading'
import Toasted from 'vue-toasted'
//import moment from 'moment'

/**
 *  project's JavaScript dependencies,Vue and other libraries.
 */
require('./bootstrap');
require('vue-animate/dist/vue-animate.min.css')
require('icheck/icheck.min.js')
require('toastr/build/toastr.min.js')
//require('moment/min/moment.min.js')

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('personEdit', require('./components/person/Edit.vue'));

//3rd components
Vue.use(BootstrapVue);

Vue.component('datepicker', DatePicker)
Vue.component('v-select', vSelect)
Vue.use(VueLoading)
Vue.use(Toasted, {
  duration: 3000,
  iconPack: 'fontawesome',
  theme: 'outline'
})
Vue.use(wysiwyg, {
  maxHeight: "400px"
})

var moment = require('moment');

moment: moment
//Localization
Vue.prototype.trans = string => _.get(window.i18n, string);
window.trans = string => _.get(window.i18n, string);

window.clone = function(obj) {
  return JSON.parse(JSON.stringify(obj))
}

const app = new Vue({
  el: '#app',
  router,
  store,
});