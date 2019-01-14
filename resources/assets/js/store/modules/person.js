let state = {
  persons: [],
  perPage: null,
  loading: false,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  list: [],
}

let getters = {
  //
}

let actions = {
  getPersons(context, params) {
    context.state.loading = true
    axios.get('api/getCoustomer')
    
  }


}

let mutations = {
  getPersons(state, {
    data
  }) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.persons = data.data;
  },

  storePerson(state, newPerson) {
    state.persons.unshift(newPerson);
  },

  updatePerson(state, {id, draft}) {
    let index = state.persons.findIndex(person => person.id == id);
    state.persons.splice(index, 1, draft);
  },

  removePerson(state, id) {
    let index = state.persons.findIndex(person => person.id == id);
    state.persons.splice(index, 1);
  }
}

export default {state,getters,actions,mutations}
