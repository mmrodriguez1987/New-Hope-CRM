import Vue from 'vue'
import Vuex from 'vuex'
import person from './modules/person'


Vue.use(Vuex)

let store = new Vuex.Store({
  modules: {
    person
  }
})

export default store