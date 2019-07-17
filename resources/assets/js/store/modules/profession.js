let state = {
    professions: [],
    list: [],
    perPage: null,
    loading: false,
    currentPage: 1,
    lastPage: null,
    totalRows: null
}

let getters = {
    findProfession(state) {
        return function (id) {
            let profession = state.professions.find(profession => profession.id == id)
            return profession;
        }
    }
}

let actions = {
    getProfession(context, params) {
        axios.get('/admin/profession?page=' + params.page + '&search=' + params.target)
            .then(response => {
                context.commit('getProfession', { data: response.data })
                context.state.loading = false
            })
            .catch(error => {
                Vue.toasted.show(error.message, { icon: 'exclamation-triangle', type: 'error' })
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

    createProfession({ commit, state }, payload) {
        state.loading = true
        axios.post('/admin/profession/', payload)
            .then(response => {
                Vue.toasted.show(response.data.message, { icon: 'plus', type: 'success' })
                commit('createProfession', response.data.data)
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

    updateProfession({ commit, state }, payload) {
        state.loading = true
        axios.put('/admin/profession/' + payload.id, payload)
            .then(response => {
                Vue.toasted.show(response.data.message, { icon: 'pencil', type: 'info' })
                commit('updateProfession', response.data.data)
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

    removeProfession(context, id) {
        context.state.loading = true
        axios.delete('/admin/profession/' + id)
            .then(response => {
                context.commit('removeProfession', id)
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

    listProfession(context) {
        axios.get('/api/professionList')
            .then(response => {
                context.commit('listProfession', { data: response.data })
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
            })
    }
}

let mutations = {
    getProfession(state, { data }) {
        state.currentPage = data.current_page
        state.lastPage = data.last_page
        state.totalRows = data.total
        state.perPage = data.per_page
        state.professions = data.data
    },

    createProfession(state, draft) {
        state.professions.unshift(draft)
    },

    updateProfession(state, { id, draft }) {
      let index = state.professions.findIndex(profession => profession.id == id)
      state.professions.splice(index, 1, draft)
    },

    removeProfession(state, id) {
      let index = state.professions.findIndex(profession => profession.id == id)
      state.professions.splice(index, 1)
    },

    listProfession(state, data) {
      state.list = data.data
    }
}

export default { state, getters, actions, mutations }
