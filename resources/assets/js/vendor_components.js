import BootstrapVue from 'bootstrap-vue'
import VueAxios from 'vue-axios'
import VueAuth from '@websanova/vue-auth'
//import wysiwyg from "vue-wysiwyg"
//import Toasted from 'vue-toasted'
import auth from './auth'


import _ from 'lodash'
//import vSelect from 'vue-select'

//Bootstrap Vue
Vue.use(BootstrapVue)

Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)

//Vue.use(Toasted,  {duration: 10000, iconPack : 'fontawesome', theme: 'outline'})

//Vue.use(wysiwyg, {  maxHeight: "500px" })

//Vue.component('v-select', vSelect)

//*Moment
Vue.use(require('vue-moment'))