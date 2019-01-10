let state = {
  persons: [],
  perPage: null,
  loading: false,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
}

let getters = {
  //
}

let actions = {

  getAllPersons({commit, state}) {
    state.loading = true
    axios.get('api/getAllPersons')
    .then(response => {
      commit('getAllPersons'. {
        list: response.data
      })
      state.loading = false
    })
    .catch(console.error => {
        Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
        state.loading = false
    })
  },

  loadPersons(context, params) {
    context.state.loading = true
    axios.get('api/getPersons?page=' + params.page + '&search=' + params.target + '&orderBy=' + params.orderBy + '&desc=' + params.desc)
    .then( =>{
      context.commit('setPerson', {list: response.data})
      context.statte.loading = false
    }).catch(error => {
          Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
          state.loading = false
    })
  },


  getPersons(context, params) {
    axios.get('/api/person?page=' + params.page + '&search=' + params.target + '&orderBy=' + params.orderBy + '&desc=' + params.desc)
      .then(response => {
        context.commit('getPersons', {
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

  storePerson(context, payload) {
    axios.post('api/v1/person', payload)
      .then(response => {
        let newPerson = {
          id: response.data.id,
          firstname: payload.firstname,
          lastname: payload.lastname,
          maritalstatus: payload.maritalstatus,
          birthday: payload.birthday,
          sex: payload.sex,
          address: payload.address,
          street: payload.street,
          city: payload.city,
          zipcode: payload.zipcode,
          email: payload.email,
          cnt_emerg_name: payload.cnt_emerg_name,
          cnt_emerg_phone: payload.cnt_emerg_phone,
          cnt_emerg_address: payload.cnt_emerg_address,
          crt_employer_name: payload.crt_employer_name,
          persontype_id: payload.persontype_id,
          position_id: payload.position_id,
          user_creac_id: payload.user_creac_id,
          user_modif_id: payload.user_modif_id,
          active: payload.active,
        }
        Vue.toasted.show(response.data.message, {icon: 'plus', type: 'success'})
        context.commit('storePerson', newPerson)
      })
      .catch(error => {
        Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
      })
  },

  updatePerson(context, payload) {
    axios.put('api/v1/person/' + payload.id, payload.draft)
      .then(response => {
        Vue.toasted.show(response.data.message, { icon: 'pencil', type: 'info' })
        context.commit('updatePerson', payload)
      })
      .catch(error => {
        Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error'})
      })
  },

  removePerson(context, id) {
    axios.delete('api/v1/person/' + id)
      .then(response => {
        context.commit('removePerson', id)
        Vue.toasted.show(response.data.message, { icon: 'trash', type: 'error'})
      })
      .catch(error => {
        Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error'})
      })
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
