let state = {
  personTypes: [],
  perPage: null,
  currentPage: 1,
  lastPage: null,
  totalRows: null,
  list: [],
  loading: false,
  data: [],
}

let getters = {
  findPersonType(state){
    return function(id){
      console.log(id)
      let personType = state.personTypes.find(personType => personType.id == id)
      return personType;
    }
  },
}

let actions = {
  getPersonTypes(context, params) {
    axios.get('api/admin/persontype?page=' + params.page + '&search=' + params.target + '&orderBy=' + params.orderBy + '&desc=' + params.desc)
      .then(response => {
        context.commit('getPersonYypes', {
        data: response.data
      })
    })
    .catch(error => {
      console.log('Error on getPersonTypes' + error.message)
      Vue.toasted.show(error.message, {
        icon: 'exclamation-triangle',
        type: 'error'
      })
    })
  },

  storePersonType(context, payload) {
    context.state.loading = true
    axios.post('api/admin/persontype', payload.draft)
    .then(response => {
      if (response.data.status == 0) {
        for (var i = response.data.message.length - 1; i >= 0; i--) {
          Vue.toasted.show(response.data.message[i], {icon: 'exclamation-triangle', type: 'error'})
        }
      } else {
        let newPersontype = {
          id: response.data.id,
          name: payload.name,
          user_creac_id: payload.user_creac_id,
          user_modif_id: payload.user_modif_id,
          active: payload.active,
        }
        context.commit('storePersonType', newPersontype)
        Vue.toasted.show(response.data.message, {icon: 'plus', type: 'success'})
      }
      context.state.loading = false
    })
    .catch(error => {
      console.log('Error on storePersonType' + error.message)
      Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error'})
      context.state.loading = false
    })
  },

  updatePersonType(context, payload) {
    context.state.loading = true
    axios.put('api/admin/persontype/' + payload.id, payload.draft)
    .then(response => {

      if (response.data.status == 0) {
        for (var i = response.data.message.length - 1; i >= 0; i--) {
          Vue.toasted.show(response.data.message[i], {icon: 'exclamation-triangle', type: 'error'})
        }
      }else{
        Vue.toasted.show(response.data.message, {icon: 'pencil', type: 'info'})
        context.commit('updatePersonType', payload)
      }
      context.state.loading = false
    })
    .catch(error => {
      console.log('Error on updatePersonType' + error.message)
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
      context.state.loading = false
    })
  },

  removePersonType(context, id) {
    context.state.loading = true
    axios.delete('api/admin/persontype/' + id)
    .then(response => {
      context.commit('removePersonType', id)
      Vue.toasted.show(response.data.message, { icon: 'trash', type: 'error'})
      context.state.loading = false
    })
    .catch(error => {
      console.log('Error on removePersonType' + error.message)
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle',type: 'error'})
      context.state.loading = false
    })
  },

  listPersontypes(context){
    axios.get('api/admin/personTypeList')
    .then(response => {
      context.commit('listPersontypes', {data: response.data})
    })
    .catch(error => {
      Vue.toasted.show(error.message, {icon: 'exclamation-triangle', type: 'error'})
    })
  },
}

let mutations = {
  getPersontypes(state, {data }) {
    state.currentPage = data.current_page
    state.lastPage = data.last_page
    state.totalRows = data.total
    state.perPage = data.per_page
    state.persontypes = data.data;
  },
  storePersontype(state, newPersontype) {
    state.persontypes.unshift(newPersontype);
  },
  updatePersontype(state, {id, draft}) {
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

export default { state, getters, actions, mutations}
