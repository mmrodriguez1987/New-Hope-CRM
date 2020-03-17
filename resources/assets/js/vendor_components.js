
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
Vue.use(Toasted, { duration: 10000, iconPack: 'fontawesome', theme: 'outline'})
Vue.use(Snotify, options)
//Vue.use(wysiwyg, {  maxHeight: "500px" })
Vue.component('v-select', vSelect)