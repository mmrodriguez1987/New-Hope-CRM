import Vue from 'vue'
import Vuex from 'vuex'
import person from './modules/person'
import persontype from './modules/persontype'
import position from './modules/position'

Vue.use(Vuex)

let store = new Vuex.Store({
  modules: {
    person,
    persontype,
    position,
  }
})

export default store