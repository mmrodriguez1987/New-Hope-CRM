import Vue from 'vue'
import Vuex from 'vuex'
import Person from './modules/person.js'
import Profession from './modules/profession.js'
import PersonType from './modules/persontype.js'
import Position from './modules/position.js'

//import VuexPersist  from 'vuex-persistedstate'

Vue.use(Vuex)

const state = {
  sidebarShow: 'responsive',
  sidebarMinimize: false,
  asideShow: false,
  darkMode: false
}

const mutations = {
  toggleSidebarDesktop (state) {
    const sidebarOpened = [true, 'responsive'].includes(state.sidebarShow)
    state.sidebarShow = sidebarOpened ? false : 'responsive'
  },
  toggleSidebarMobile (state) {
    const sidebarClosed = [false, 'responsive'].includes(state.sidebarShow)
    state.sidebarShow = sidebarClosed ? true : 'responsive'
  },
  set (state, [variable, value]) {
    state[variable] = value
  },
  toggle (state, variable) {
    state[variable] = !state[variable]
  }
}


let store = new Vuex.Store({
  modules: {
    Person,
    PersonType,
    Position,
    Profession
  },
  state,
  mutations
})

export default store
