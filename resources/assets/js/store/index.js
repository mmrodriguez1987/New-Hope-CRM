import Vue from 'vue'
import Vuex from 'vuex'
import Person from './modules/person.js'
import Profession from './modules/profession.js'
import PersonType from './modules/persontype.js'
import Position from './modules/position.js'

//import VuexPersist  from 'vuex-persistedstate'

Vue.use(Vuex)

//const vuexLocalStorage = new VuexPersist({
  // The key to store the state on in the storage provider.
  //key: 'vuex',
  //storage: window.localStorage, // or window.sessionStorage or localForage
  // Function that passes the state and returns the state with only the objects you want to store.
  // reducer: state => state,
  // Function that passes a mutation and lets you decide if it should update the state in localStorage.
  // filter: mutation => (true)
//})

let store = new Vuex.Store({
  modules: {
    Person,
    PersonType,
    Position,
    Profession
  }//,
  //plugins: [vuexLocalStorage.plugin],  
})

export default store
