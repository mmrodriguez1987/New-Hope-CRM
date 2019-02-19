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
    axios.get('/admin/position?page=' + params.page + '&search=' + params.target)
    .then(response => {
      context.commit('getPosition', { data: response.data })
      context.state.loading = false
    })
    .catch(error => {
      context.state.loading = false
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error' })
      if (error.response) {                    
          console.log(error.response.data);
          console.log(error.response.status);
          console.log(error.response.headers);
      } else if (error.request) {                    
          console.log(error.request);
      } else {                   
          console.log('Error', error.message);
      }
      console.log(error.config);
      context.state.loading = false
    })
  },

  createPosition({ commit, state }, payload) {
    state.loading = true
    axios.post('/admin/position/', payload)
        .then(response => {
            Vue.toasted.show(response.data.message, { icon: 'plus', type: 'success' })
            commit('createPosition', response.data.data)
            state.loading = false
        })
        .catch(error => {
            Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error' })                
            if (error.response) {
                console.log(error.response.data)
                console.log(error.response.status)
                console.log(error.response.headers)
            } else if (error.request) {
                console.log(error.request)
            } else {
                console.log('Error', error.message)
            }
            console.log(error.config);
            state.loading = false
        })
  },

  updatePosition({ commit, state }, payload) {
    state.loading = true
    axios.put('/admin/position/' + payload.id, payload)
        .then(response => {
            Vue.toasted.show(response.data.message, { icon: 'pencil', type: 'info' })
            commit('updatePosition', response.data.data)
            state.loading = false
        })
        .catch(error => { 
            Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error' })
            if (error.response) {
                console.log(error.response.data)
                console.log(error.response.status)
                console.log(error.response.headers)
            } else if (error.request) {
                console.log(error.request)
            } else {
                console.log('Error', error.message)
            }
            console.log(error.config);
            state.loading = false
        })
  },
  removePosition(context, id) {
    context.state.loading = true
    axios.delete('/admin/position/' + id)
        .then(response => {
            context.commit('removePosition', id)
            Vue.toasted.show(response.data.message, { icon: 'trash-o', type: 'error' })
            context.state.loading = false
        })
        .catch(error => {
            Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error' })
            if (error.response) {
                console.log(error.response.data)
                console.log(error.response.status)
                console.log(error.response.headers)
            } else if (error.request) {
                console.log(error.request)
            } else {
                console.log('Error', error.message)
            }
            console.log(error.config);
            context.state.loading = false
        })
  },

  listPosition(context) {
    context.state.loading = true
    axios.get('/admin/positionList')
      .then(response => {
        context.commit('listPositions', {data: response.data})
        context.state.loading = false
      })
      .catch(error => {
        console.log(error)
        context.state.loading = false
        Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
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
    state.list = data.data;
  },
}

export default { state, getters, actions, mutations }
