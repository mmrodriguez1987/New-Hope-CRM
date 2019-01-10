import Vue from 'vue'
import Vuex from 'vuex'
import Person from './modules/Person.js'
import PersonType from './modules/PersonType.js'
import Position from './modules/Position.js'

Vue.use(Vuex)

let store = new Vuex.Store({
  modules: {
    Person,
    PersonType,
    Position,
  }
})

export default store
