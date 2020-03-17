// import BootstrapVue from 'bootstrap-vue';
// //import wysiwyg from "vue-wysiwyg"
// //import Toasted from 'vue-toasted'
// import CoreuiVue from '@coreui/vue'
// import {
//   iconsSet as icons
// } from './icons/icons.js'

// import _ from 'lodash'
// //import vSelect from 'vue-select'

// //*Bootstrap Vue
// Vue.use(BootstrapVue)
// Vue.use(CoreuiVue)
// Vue.use(iconsSet)

// //Vue.use(Toasted,  {duration: 10000, iconPack : 'fontawesome', theme: 'outline'})

// //Vue.use(wysiwyg, {  maxHeight: "500px" })

// //Vue.component('v-select', vSelect)

// //*Moment
// Vue.use(require('vue-moment'))

Vue.use(require('bootstrap-vue'))
Vue.use(require('vue-moment'))
//import wysiwyg from "vue-wysiwyg"

import _ from 'lodash'
import Toasted from 'vue-toasted'
import vSelect from 'vue-select'
import CoreuiVue from '@coreui/vue'
import Snotify, {
  SnotifyPosition
} from 'vue-snotify'

const options = {
  toast: {
    position: SnotifyPosition.rightTop
  }
}

Vue.use(CoreuiVue)
Vue.use(Toasted, {
  duration: 10000,
  iconPack: 'fontawesome',
  theme: 'outline'
})
Vue.use(Snotify, options)
//Vue.use(wysiwyg, {  maxHeight: "500px" })
Vue.component('v-select', vSelect)