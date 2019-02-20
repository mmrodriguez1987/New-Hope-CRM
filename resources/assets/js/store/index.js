import Vue from 'vue'
import Vuex from 'vuex'
import Person from './modules/person.js'
import Profession from './modules/profession.js'
import PersonType from './modules/persontype.js'
import Position from './modules/position.js'

import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

let store = new Vuex.Store({
  modules: {
    Person,
    PersonType,
    Position,
    Profession
  },
  plugins: [createPersistedState()],  
})

export default store
