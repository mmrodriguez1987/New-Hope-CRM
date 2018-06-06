let state = {
  positions: [],
  perPage: null,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  list: [],
}

let getters = {
  //
}

let actions = {
  getPositions(context, params) {
    axios.get('api/v1/position?page=' + params.page + '&search=' + params.target + '&orderBy=' + params.orderBy + '&desc=' + params.desc)
      .then(response => {
        context.commit('getPositions', {
          data: response.data
        })
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
      })
  },

  storePosition(context, payload) {
    axios.post('api/v1/position', payload)
      .then(response => {
        let newPosition = {
          id: response.data.id,
          name: payload.name,
          user_creac_id: payload.user_creac_id,
          user_modif_id: payload.user_modif_id,
          active: payload.active,
        }
        Vue.toasted.show(response.data.message, {
          icon: 'plus',
          type: 'success'
        })
        context.commit('storePosition', newPosition)
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
      })
  },

  updatePosition(context, payload) {
    axios.put('api/v1/position/' + payload.id, payload.draft)
      .then(response => {
        Vue.toasted.show(response.data.message, {
          icon: 'pencil',
          type: 'info'
        })
        context.commit('updatePosition', payload)
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
      })
  },

  removePosition(context, id) {
    axios.delete('api/v1/position/' + id)
      .then(response => {
        context.commit('removePosition', id)
        Vue.toasted.show(response.data.message, {
          icon: 'trash',
          type: 'error'
        })
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
      })
  }
}

let mutations = {
  getPosition(state, {
    data
  }) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.positions = data.data;
  },

  storePosition(state, newPosition) {
    state.positions.unshift(newPosition);
  },

  updatePosition(state, {
    id,
    draft
  }) {
    let index = state.positions.findIndex(positions => position.id == id);
    state.positions.splice(index, 1, draft);
  },

  removePosition(state, id) {
    let index = state.positions.findIndex(position => position.id == id);
    state.positions.splice(index, 1);
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}