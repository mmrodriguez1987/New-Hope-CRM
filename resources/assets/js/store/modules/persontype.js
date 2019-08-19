let state = {
  persontypes: [],
  list: [],
  perPage: null,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  loading: false
}

let getters = {
  findPersontypes(state){
    return function(id){
      let persontype = state.persontypes.find(persontype => persontype.id == id)
      return persontype;
    }
  },
}

let actions = {
  getPersontypes(context, params) {
    context.state.loading = true
    axios.get('/api/persontype?page=' + params.page + '&search=' + params.target + '&rows' + params.rows)
    .then(response => {
      context.commit('getPersontype', { data: response.data })
      context.state.loading = false
    })
    .catch(error => {    
      Vue.$snotify.error('Error description:' + error.message, 'Error getting Person Types Data')
      console.log('Error', error.message)
      context.state.loading = false
    })
  },

  createPersontype({ commit, state }, payload) {
    state.loading = true
    axios.post('/api/persontype/', payload)
        .then(response => {
          commit('createPersontype', response.data.data)
          Vue.$snotify.success(response.data.message);
          state.loading = false
        })
        .catch(error => {
          Vue.$snotify.error('Error description:' + error.message, 'Error creating Person Type Data')
          console.log('Error', error.message)
          state.loading = false
        })
  },

  updatePersontype({ commit, state }, payload) {
    state.loading = true
    axios.put('/api/persontype/' + payload.id, payload)
        .then(response => {            
          commit('updatePersontype', response.data.data)
          Vue.$snotify.success(response.data.message);
          state.loading = false
        })
        .catch(error => { 
          Vue.$snotify.error('Error description:' + error.message, 'Error creating person type data')
          console.log('Error', error.message)
          state.loading = false
        })
  },
  removePersontype(context, id) {
    context.state.loading = true
    axios.delete('/api/persontype/' + id)
        .then(response => {
          context.commit('removePersontype', id)
          Vue.$snotify.success(response.data.message);
          context.state.loading = false
        })
        .catch(error => {
          Vue.$snotify.error('Error description:' + error.message, 'Error deleting person type data')
          console.log('Error', error.message)
          state.loading = false
        })
  },

  listPersontype(context) {
    context.state.loading = true
    axios.get('/api/persontypeList')
      .then(response => {
        context.commit('listPersontype', {data: response.data})
        context.state.loading = false
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
        console.log('Error', error.message)
         context.state.loading = false
      })
  },
}

let mutations = {
  getPersontypes(state, {data}) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.persontypes = data.data;
  },
  createPersontype(state, draft) {
    state.persontypes.unshift(draft)
},
  updatePersontype(state, {id, draft} ) {
    let index = state.persontypes.findIndex(persontype => persontype.id == id);
    state.persontypes.splice(index, 1, draft);
  },
  removePersontype(state, id) {
    let index = state.persontypes.findIndex(persontype => persontype.id == id);
    state.persontypes.splice(index, 1);
  },
  listPersontype(state, data) {
    state.list = data.data
  },
}

export default { state, getters, actions, mutations }
