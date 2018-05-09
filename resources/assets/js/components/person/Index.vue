<template>
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{trans('backend.person.title')}}</h3>
  </div>
  <div class="box-body">
    <div class="form-inline pull-right">
      <button type="button" class="btn btn-success mb-2" @click="create">
        <i class="fa fa-plus"></i>
        {{trans('backend.person.add')}}
      </button>
    </div>
    <form class="form-inline pull-left">
      <div class="form-group mx-sm-6 mb-2">
        <label class="sr-only">{{trans('backend.person.search')}}</label>
        <input type="text" class="form-control" :placeholder="trans('backend.person.search')" v-model="target" @keyup.enter="goPage">
      </div>
      <button type="button" class="btn btn-primary mb-2" @click.prevent="goPage"><i class="fa fa-search"></i></button>
    </form>
    <div class="clearfix"></div>
    <hr>
    <b-table striped hover :items="persons" :fields="fields">
      <!-- <template slot="role" slot-scope="row">
            {{trans('own.role.' + row.item.role)}}
      </template> -->
      <template slot="actions" slot-scope="row">
        <button class="btn btn-info btn-sm" @click="edit(row.item, row.index)">
          <i class="fa fa-pencil"></i>
        </button>
        <button class="btn btn-danger btn-sm" @click="remove(row.item, row.index)">
          <i class="fa fa-trash"></i>
        </button>
      </template>
    </b-table>
    <user-edit :show="showEdit" :draft="draft" @close="close"></user-edit>
  </div>
  <div class="box-footer text-center">
    <b-pagination :total-rows="totalRows" :per-page="perPage" align="center" v-model="currentPage" class="my-0" @input="goPage" />
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      fields: [{
          key: 'id',
          label: 'Id',
          sortable: true
        },
        {
          key: 'firstname',
          label: trans('backend.person.lbl_firstname'),
          sortable: true
        },
        {
          key: 'lastname',
          label: trans('backend.person.lbl_lastname'),
          sortable: true
        },
        {
          key: 'email',
          label: trans('backend.person.lbl_email'),
          sortable: true
        },
        {
          key: 'birthdate',
          label: trans('backend.person.lbl_birthday'),
          sortable: true
        },
        {
          key: 'sex',
          label: trans('backend.person.lbl_sex'),
          sortable: true
        },
        {
          key: 'adress',
          label: trans('backend.person.lbl_address'),
          sortable: true
        },
        {
          key: 'street',
          label: trans('backend.person.lbl_street'),
          sortable: true
        },
        {
          key: 'zipcode',
          label: trans('backend.person.lbl_zipcode'),
          sortable: true
        },
        {
          key: 'city',
          label: trans('backend.person.lbl_city'),
          sortable: true
        },
        {
          key: 'maritalstatus',
          label: trans('backend.person.lbl_maritalstatus'),
          sortable: true
        },
        {
          key: 'maritalstatus',
          label: trans('backend.person.lbl_maritalstatus'),
          sortable: true
        },
        {
          key: 'actions',
          label: trans('own.user.actions')
        },
      ],
      currentPage: null,
      target: '',
      draft: {},
      currentIndex: null,
      showEdit: false
    }
  },
  mounted() {
    this.goPage(1);
  },
  methods: {
    edit(user, index) {
      this.draft = clone(user)
      this.currentIndex = index
      this.showEdit = true
    },
    create() {
      this.draft = {
        id: null,
        name: '',
        email: '',
        role: null,
      }
      this.showEdit = true
    },
    goPage() {
      this.getUsers(this.currentPage)
    },
    getUsers(page) {
      let params = {
        page: page,
        target: this.target
      }
      this.$store.dispatch('getUsers', params)
    },
    close() {
      this.showEdit = false
    },
    remove(item, index) {
      if (confirm(trans('backend.person.delete_confirm') + item.name + '?')) {
        this.$store.dispatch('removeUser', item.id)
      }
    },
  },
  computed: {
    users() {
      return this.$store.state.user.users
    },
    current_page() {
      return this.$store.state.user.currentPage
    },
    totalRows() {
      return this.$store.state.user.totalRows
    },
    perPage() {
      return this.$store.state.user.perPage
    },
  }
}
</script>
