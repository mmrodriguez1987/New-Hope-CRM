let state = {
  persons: [], 
  list: [],
  perPage: null,
  loading: false,
  currentPage: 1,
  lastPage: null,
  totalRows: null
}

let getters = {
  findPerson(state) {
    return function(id) {
      let person = state.persons.find(person => person.id == id)
      return person;
    }
  }
}

let actions = {
  getPersons(context, params) {  
    axios.get('api/person?page=' + params.page + '&search=' + params.target)
    .then(response => {
      context.commit('getPersons', { data: response.data })       
      context.state.loading = false
    })
   .catch(error => {
      Vue.$snotify.error('Error description:' + error.message, 'Error getting Persons Data')    
      console.log('Error', error.message)      
      context.state.loading = false
    })
  },

  createPerson({ commit, state }, payload) {
    state.loading = true
    axios.post('/api/person/', payload)
    .then(response => {      
      commit('createPerson', response.data.data)
      Vue.$snotify.success(response.data.message)
      state.loading = false
    })
    .catch(error => {     
      Vue.$snotify.error('Error description: ' + error.message, 'Error Creating Persons Data')
      console.log('Error', error.message)
      state.loading = false
    })
  },

  updatePerson({ commit, state }, payload) {
    state.loading = true
    axios.put('/api/person/' + payload.id, payload)
    .then(response => {
      commit('updatePerson', response.data.data)
      Vue.$snotify.success(response.data.message)
      state.loading = false
    })
    .catch(error => {
      Vue.$snotify.error('Error description: ' + error.message, 'Error Updating Persons Data') 
      console.log('Error', error.message)
      state.loading = false
    })
  },

  removePerson(context, id) {
    context.state.loading = true
    axios.delete('/api/person/' + id)
    .then(response => {
      context.commit('removePerson', id)      
      Vue.$snotify.success(response.data.message)
      context.state.loading = false
    })
    .catch(error => {
      Vue.$snotify.error('Error description: ' + error.message, 'Error Removing Persons Data')
      console.log('Error', error.message)
      context.state.loading = false
    })
  },

  listPerson(context) {
    axios.get('/api/personList')
    .then(response => {
      context.commit('listPerson', { data: response.data })
    })
    .catch(error => {
      Vue.$snotify.error('Error description: ' + error.message, 'Error Removing Persons Data')
      console.log('Error', error.message)
      context.state.loading = false
    })
  }
}

let mutations = {
  getPersons(state, { data }) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.persons = data.data
  },

  createPerson(state, draft) {
    state.persons.unshift(draft)
  },

  updatePerson(state, { id, draft }) {
    let index = state.persons.findIndex(person => person.id == id)
    state.persons.splice(index, 1, draft)
  },

  removePerson(state, id) {
    let index = state.persons.findIndex(person => person.id == id)
    state.persons.splice(index, 1)
  },

  listPerson(state, data) {
    state.list = data.data
  }
}

export default { state, getters, actions, mutations }