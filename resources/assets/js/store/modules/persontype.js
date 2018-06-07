let state = {
  persontypes: [],
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
  getPersontypes(context, params) {
    axios.get('api/v1/persontype?page=' + params.page + '&search=' + params.target + '&orderBy=' + params.orderBy + '&desc=' + params.desc)
      .then(response => {
        context.commit('getPersontypes', {
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

  storePersontype(context, payload) {
    axios.post('api/v1/persontype', payload)
      .then(response => {
        let newPersontype = {
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
        context.commit('storePersontype', newPersontype)
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
      })
  },

  updatePersontype(context, payload) {
    axios.put('api/v1/persontype/' + payload.id, payload.draft)
      .then(response => {
        Vue.toasted.show(response.data.message, {
          icon: 'pencil',
          type: 'info'
        })
        context.commit('updatePersontype', payload)
      })
      .catch(error => {
        Vue.toasted.show(error.message, {
          icon: 'exclamation-triangle',
          type: 'error'
        })
      })
  },

  removePersontype(context, id) {
    axios.delete('api/v1/persontype/' + id)
      .then(response => {
        context.commit('removePersontype', id)
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
  }, 

  listPersontypes(context){
        axios.get('api/v1/persontypeList')
            .then(response => {
                context.commit('listPersontypes', {data: response.data})
            })
            .catch(error => {
                Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
            })
    },
}

let mutations = {
  getPersontypes(state, {
    data
  }) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.persontypes = data.data;
  },

  storePersontype(state, newPersontype) {
    state.persontypes.unshift(newPersontype);
  },

  updatePersontype(state, {
    id,
    draft
  }) {
    let index = state.persontypes.findIndex(persontype => persontype.id == id);
    state.persontypes.splice(index, 1, draft);
  },

  removePersontype(state, id) {
    let index = state.persontypes.findIndex(persontype => persontype.id == id);
    state.persontypes.splice(index, 1);
  },

  listPersontypes(state, data){
        state.list = data.data;
    },
}

export default {
  state,
  getters,
  actions,
  mutations
}
