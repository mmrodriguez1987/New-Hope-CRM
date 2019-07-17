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
    axios.get('/admin/persontype?page=' + params.page + '&search=' + params.target)
    .then(response => {
      context.commit('getPersontype', { data: response.data })
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

  createPersontype({ commit, state }, payload) {
    state.loading = true
    axios.post('/admin/persontype/', payload)
        .then(response => {
            Vue.toasted.show(response.data.message, { icon: 'plus', type: 'success' })
            commit('createPersontype', response.data.data)
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

  updatePersontype({ commit, state }, payload) {
    state.loading = true
    axios.put('/admin/persontype/' + payload.id, payload)
        .then(response => {
            Vue.toasted.show(response.data.message, { icon: 'pencil', type: 'info' })
            commit('updatePersontype', response.data.data)
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
  removePersontype(context, id) {
    context.state.loading = true
    axios.delete('/admin/persontype/' + id)
        .then(response => {
            context.commit('removePersontype', id)
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

  listPersontype(context) {
    context.state.loading = true
    axios.get('/api/persontypeList')
      .then(response => {
        context.commit('listPersontype', {data: response.data})
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
    state.list = data.data;
  },
}

export default { state, getters, actions, mutations }
