let state = {
  data: [],
  persons: [],
  perPage: null,
  loading: false,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  currentPersonTypeId: null,
  currentPositionTypeId: null,
  list: [],
}

let getters = {
  findPerson(state) {
    return function(id) {
      let person = state.data.find(person => person.id == id)
      return person;
    }
  },
}

let actions = {
  getPersons(context, params) {
    context.state.loading = true
    axios.get('api/admin/person?page=' + params.page + '&search=' + params.target + '&odertBy=' + params.orderBy + '&desc=' + params.sortDesc)
      .then(response => {
        context.commit('getPersons', {
          list: reponse.data
        })
        context.state.loading = false
      }).catch(error => {
        Vue.toasted.show('Error in store.module.Person.getPersons: '+ error.message, {icon: 'exclamation-triangle', type: 'error'})
        console.log('Error in store.module.Person.getPersons: ' + error.data)
        context.state.loading = false
      })
  },
  createPerson({commit,state}, payload) {
    state.loading = true
    axios.post('/api/admin/person/', payload)
      .then(response => {
        Vue.toasted.show(response.data.message, {icon: 'plus', type: 'success'})
        commit('createPerson', response.data.data)
        state.loading = false
      }).catch(error => {
        Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
        state.loading = false
      })
  },
  updatePerson({commit,state}, payload){
    state.loading = true
    axios.put('/api/admin/person/' + payload.id, payload)
      .then(response => {
        Vue.toasted.show(response.data.message, {icon: 'pencil', type: 'info'})
        commit('updatePerson', response.data.data)
        state.loading = false
      }).catch(error => {
        Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
				state.loading = false
      })
  },
  removePerson(context, id){
    context.state.loading = true
    axios.delete('/api/admin/person/'+id)
    .then(response => {
      context.commit('removePerson', id)
      Vue.toasted.show(response.data.message, {icon: 'trash-o', type: 'error'})
      context.state.loading = false
    }).catch(error => {
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
      context.state.loading = false
	   })
	},
  listPerson(context){
    axios.get('/api/admin/personList')
    .then(response => {
      context.commit('listPerson', {data: response.data})
    }).catch(error => {
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
    })
  },
}

let mutations = {
  getPersons(state, {data}) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.persons = data.data;
  },

  createPerson(state, draft) {
    state.persons.unshift(draft);
  },

  updatePerson(state, {id, draft}) {
    let index = state.persons.findIndex(person => person.id == id);
    state.persons.splice(index, 1, draft);
  },

  removePerson(state, id) {
    let index = state.persons.findIndex(person => person.id == id);
    state.persons.splice(index, 1);
  },

  listPerson(state, data){
    state.list = data.data;
  },
}

export default { state, getters, actions, mutations }
