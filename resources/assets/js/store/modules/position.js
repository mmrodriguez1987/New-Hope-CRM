let state = {
  positions: [],
  list: [],
  perPage: null,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  loading: false
}

let getters = {
  findPosition(state){
    return function(id){
      let position = state.positions.find(position => position.id == id)
      return position;
    }
  },
}

let actions = {
  getPositions(context, params) {
    context.state.loading = true
    axios.get('/api/position?page=' + params.page + '&search=' + params.target + '&rows' + params.rows)
    .then(response => {
      context.commit('getPosition', { data: response.data })
      context.state.loading = false
    })
    .catch(error => {
      Vue.$snotify.error('Error description:' + error.message, 'Error getting Position Data')
      console.log('Error', error.message)
      context.state.loading = false
    })
  },

  createPosition({ commit, state }, payload) {
    state.loading = true
    axios.post('/api/position/', payload)
    .then(response => {            
      commit('createPosition', response.data.data)
      Vue.$snotify.success(response.data.message);
      state.loading = false
    })
    .catch(error => {
      Vue.$snotify.error('Error description:' + error.message, 'Error creating Position Data')
      state.loading = false
      console.log('Error', error.message)
     
    })
  },

  updatePosition({ commit, state }, payload) {
    state.loading = true
    axios.put('/api/position/' + payload.id, payload)
    .then(response => {
      commit('updatePosition', response.data.data)
      Vue.$snotify.success(response.data.message);
      state.loading = false
    })
    .catch(error => { 
      Vue.$snotify.error('Error description:' + error.message, 'Error creating Position Data')
      console.log('Error', error.message)
      state.loading = false
    })
  },
  removePosition(context, id) {
    context.state.loading = true
    axios.delete('/api/position/' + id)
    .then(response => {
      context.commit('removePosition', id)     
      Vue.$snotify.success(response.data.message);
      context.state.loading = false
    })
    .catch(error => {
      Vue.$snotify.error('Error description:' + error.message, 'Error Removing Position Data')
      console.log('Error', error.message)
      context.state.loading = false
    })
  },

  listPosition(context) {
    context.state.loading = true
    axios.get('/api/positionList')
      .then(response => {
        context.commit('listPosition', {data: response.data})
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
  getPositions(state, {data}) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.positions = data.data;
  },
  createPosition(state, draft) {
    state.positions.unshift(draft)
},
  updatePosition(state, {id, draft} ) {
    let index = state.positions.findIndex(position => position.id == id);
    state.positions.splice(index, 1, draft);
  },
  removePosition(state, id) {
    let index = state.positions.findIndex(position => position.id == id);
    state.positions.splice(index, 1);
  },
  listPosition(state, data) {
    state.list = data.data
  },
}

export default { state, getters, actions, mutations }
