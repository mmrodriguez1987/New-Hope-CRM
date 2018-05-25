<template>
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{trans('backend.person.title')}}</h3>
  </div>
  <div class="box-body">
    <div class="form-inline pull-right">
      <button type="button" class="btn btn-success mb-2" @click="create">
        <i class="fa fa-plus"></i>
        {{trans('backend.general.add')}}
      </button>
    </div>
    <form class="form-inline pull-left">
      <div class="form-group mx-sm-6 mb-2">
        <label class="sr-only">{{trans('backend.general.search')}}</label>
        <input type="text" class="form-control" :placeholder="trans('backend.general.search')" v-model="target" @keyup.enter="goPage">
      </div>
      <button type="button" class="btn btn-primary mb-2" @click.prevent="goPage"><i class="fa fa-search"></i></button>
    </form>
    <div class="clearfix"></div>
    <hr>
    <b-table striped hover :items="persons" :fields="fields" :no-local-sorting="true" @sort-changed="sortingChanged">
      <!-- <template slot="id" slot-scope="data">
            {{data.value.id}}
      </template>
      <template slot="fullname" slot-scope="data">
            {{data.value.firstname}} {{data.value.lastname}}
      </template>
      <template slot="email" slot-scope="data">
            {{data.value.email}}
      </template>
      <template slot="birthday" slot-scope="data">
            {{data.value.birthday}}
      </template>
      <template slot="sex" slot-scope="data">
            {{data.value.sex}}
      </template>
      <template slot="maritalstatus" slot-scope="data">
            {{data.value.maritalstatus}}
      </template>
      <template slot="fulladdress" slot-scope="data">
            {{data.item.address}}, {{data.item.street}}, {{data.item.city}}, {{data.item.state}} {{data.item.zipcode}}
      </template>
      <template slot="persontype" slot-scope="row">
            {{personTypeName(row.item)}}
      </template>
      <template slot="position" slot-scope="row">
            {{positionName(row.item)}}
      </template>-->

      <template slot="actions" slot-scope="row">
        <button class="btn btn-info btn-sm" @click="edit(row.item, row.index)">
          <i class="fa fa-pencil"></i>
        </button>
        <button class="btn btn-danger btn-sm" @click="remove(row.item, row.index)">
          <i class="fa fa-trash"></i>
        </button>
      </template>
    </b-table>
    <person-edit :show="showEdit" :draft="draft" @close="close"></person-edit>
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
      fields: [
        { key: 'id',label: 'Id', sortable: true },
        { key: 'fullname', label: trans('backend.person.lbl_fullname'), sortable: true },
        { key: 'email', label: trans('backend.person.lbl_email'), sortable: true },
        { key: 'birthdate', label: trans('backend.person.lbl_birthday'), sortable: true },
        { key: 'sex', label: trans('backend.person.lbl_sex'), sortable: true },
        { key: 'maritalstatus', label: trans('backend.person.lbl_maritalstatus'), sortable: true },
        { key: 'fulladdress', label: trans('backend.person.lbl_fulladdress'), sortable: true },
        { key: 'persontype', label: trans('backend.person.lbl_persontype'), sortable: true },
        { key: 'position', label: trans('backend.person.lbl_position'), sortable: true },
        { key: 'actions', label: trans('backend.general.actions'), sortable: true },
      ],
      currentPage: null,
      target: '',
      draft: {},
      currentIndex: null,
      showEdit: false,
      sortBy: 'id',
      sortDesc: true,
    }
  },
  methods: {
    edit(person, index) {
      this.draft = clone(person)
      this.currentIndex = index
      this.showEdit = true
    },
    create() {
      this.draft = {
        id: null,
        firstname: '',
        lastname: '',
        maritalstatus: '',
        birthday: null,
        sex: '',
        address: '',
        street: '',
        zipcode: null,
        city: '',
        email: '',
        cnt_emerg_name: '',
        cnt_emerg_phone: '',
        cnt_emerg_address: '',
        crt_employer_name: '',
        crt_employer_address: '',
        position_id: null,
        persontype_id: null,
        user_creac_id: null,
        user_modif_id: null,
        active: '',
      }
      this.showEdit = true
    },
    goPage() {
      this.getPersons(this.currentPage)
    },
    getPersons(page) {
      let params = {
        page: this.currentPage,
        target: this.target,
        orderBy: this.sortBy,
        desc: this.sortDesc
      }
      this.$store.dispatch('getPersons', params)
    },
    close() {
      this.showEdit = false
    },
    remove(item, index) {
      if (confirm(trans('backend.person.delete_confirm') + item.name + '?')) {
        this.$store.dispatch('removePerson', item.id)
      }
    },
    sortingChanged(ctx) {
      if (ctx.sortBy) {
        this.sortBy = ctx.sortBy
        this.sortDesc = ctx.sortDesc
        this.currentPage = null
        this.getPersons()
      }
    },
    positionName(item) {
      var id = item.position_id
      let name = this.positions.find(position => position.id == id)
      return name;
    },
    personTypeName(item) {
      var id = item.persontype_id
      let name = this.persontypes.find(persontype => persontype.id = id)
    }
  },
  computed: {
    persons() {
      return this.$store.state.person.persons
    },
    current_page() {
      return this.$store.state.person.currentPage
    },
    totalRows() {
      return this.$store.state.person.totalRows
    },
    perPage() {
      return this.$store.state.person.perPage
    },
    positions() {
      return this.$store.state.position.list
    },
    persontypes() {
      return this.$store.state.persontype.list
    }
  }
}
</script>
