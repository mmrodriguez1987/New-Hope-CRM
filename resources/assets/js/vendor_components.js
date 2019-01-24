import BootstrapVue from 'bootstrap-vue';
import wysiwyg from "vue-wysiwyg"
import Toasted from 'vue-toasted'
//import VueGallery from 'vue-gallery'
import _ from 'lodash'
import VueSweetalert2 from 'vue-sweetalert2';
import vSelect from 'vue-select'
import DatePicker from 'vuejs-datepicker'
import VueLoading from 'vuex-loading'

//*Bootstrap Vue
Vue.use(BootstrapVue)

Vue.use(Toasted,  {duration: 10000, iconPack : 'fontawesome', theme: 'outline'})

Vue.use(wysiwyg, {  maxHeight: "500px" })

Vue.use(VueLoading)

Vue.component('datepicker', DatePicker)

Vue.component('v-select', vSelect)

//*Moment
Vue.use(require('vue-moment'))
