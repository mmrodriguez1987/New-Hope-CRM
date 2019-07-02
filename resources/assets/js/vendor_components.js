Vue.use(require('bootstrap-vue'))
Vue.use(require('vue-moment'))
//import wysiwyg from "vue-wysiwyg"

import _ from 'lodash'
import Toasted from 'vue-toasted'
import vSelect from 'vue-select'
import Snotify from 'vue-snotify'


Vue.use(Toasted,  {duration: 10000, iconPack : 'fontawesome', theme: 'outline'})
Vue.use(Snotify)
//Vue.use(wysiwyg, {  maxHeight: "500px" })
Vue.component('v-select', vSelect)


