let state = {
  positions: [],
  perPage: null,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  list: [],
  loading: false,
  data: [],
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
    axios.get('api/admin/position?page=' + params.page + '&search=' + params.target + '&orderBy=' + params.orderBy + '&desc=' + params.desc)
    .then(response => {
      context.commit('getPositions', { data: response.data })
      context.state.loading = false
    })
    .catch(error => {
      context.state.loading = false
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error' })
    })
  },

  storePosition(context, payload){
    context.state.loading = true
    axios.post('api/admin/position', payload.draft)
    .then(response => {
      if (response.data.status == 0) {
        for (var i = response.data.message.length - 1; i >= 0; i--) {
          Vue.toasted.show(response.data.message[i], {icon: 'exclamation-triangle', type: 'error'})
        }
      }else{
        let newPosition = {
          id: response.data.id,
          name: payload.draft.name,
          user_creac_id: payload.draft.user_creac_id,
          user_modif_id: payload.draft.user_modif_id,
          active: payload.draft.active,
        }
        Vue.toasted.show(response.data.message, {icon: 'plus', type: 'success'})
        context.commit('storePosition', newPosition)
      }
      context.state.loading = false
    })
    .catch(error => {
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle',type: 'error'})
      context.state.loading = false
    })
  },

  updatePosition(context, payload) {
    context.state.loading = true
    axios.put('api/admin/position/' + payload.id, payload.draft)
    .then(response => {
      if (response.data.status == 0) {
        for (var i = response.data.message.length - 1; i >= 0; i--) {
          Vue.toasted.show(response.data.message[i], {icon: 'exclamation-triangle', type: 'error'})
        }
      }else{
        Vue.toasted.show(response.data.message, {icon: 'pencil', type: 'info'})
        context.commit('updatePosition', payload)
      }
      context.state.loading = false
    })
    .catch(error => {
      console.log(error)
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
      context.state.loading = false
    })
  },

  removePosition(context, id) {
    context.state.loading = true
    axios.delete('/api/admin/blogCategory/' + id)
    .then(response => {
      context.commit('removeBlogCategory', id)
      Vue.toasted.show(response.data.message, {icon: 'trash-o', type: 'error'})
      context.state.loading = false
    })
    .catch(error => {
      context.state.loading = false
      console.log(error)
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
    })
  },

  listPositions(context) {
    context.state.loading = true
    axios.get('api/admin/positionList')
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
  storePosition(state, newPosition) {
    state.positions.unshift(newPosition);
  },
  updatePosition(state, {id, draft} ) {
    let index = state.positions.findIndex(positions => position.id == id);
    state.positions.splice(index, 1, draft);
  },
  removePosition(state, id) {
    let index = state.positions.findIndex(position => position.id == id);
    state.positions.splice(index, 1);
  },
  listPositions(state, data) {
    state.list = data.data;
  },
}

export default { state, getters, actions, mutations }
