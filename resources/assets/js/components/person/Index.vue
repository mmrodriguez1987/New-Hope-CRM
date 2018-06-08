<template>
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{trans('bck.person.title')}}</h3>
  </div>
  <div class="box-body">
    <div class="form-inline pull-right">
      <button type="button" class="btn btn-success mb-2" @click="create">
        <i class="fa fa-plus"></i>
        {{trans('bck.general.add')}}
      </button>
    </div>
    <form class="form-inline pull-left">
      <div class="form-group mx-sm-6 mb-2">
        <label class="sr-only">{{trans('bck.general.search')}}</label>
        <input type="text" class="form-control" :placeholder="trans('bck.general.search')" v-model="target" @keyup.enter="goPage">
      </div>
      <button type="button" class="btn btn-primary mb-2" @click.prevent="goPage"><i class="fa fa-search"></i></button>
    </form>
    <div class="clearfix"></div>
    <hr>
    <b-table striped hover :items="persons" :fields="fields" :no-local-sorting="true" @sort-changed="sortingChanged">
      <template slot="fullname" slot-scope="row">
            {{row.item.firstname}} {{row.item.lastname}}
      </template>
      <template slot="fulladdress" slot-scope="row">
            {{row.item.address}}, {{row.item.street}}, {{row.item.city}}, {{row.item.state}} {{row.item.zipcode}}
      </template>

      <!-- <template slot="id" slot-scope="data">
            {{data.value.id}}
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
      </template>-->
      <template slot="persontype" slot-scope="row">
            {{personTypeName(row.item)}}
      </template>
      <template slot="position" slot-scope="row">
            {{positionName(row.item)}}
      </template>

      <template slot="actions" slot-scope="row">
        <button class="btn btn-info btn-sm" @click="edit(row.item, row.index)">
          <i class="fa fa-pencil"></i>
        </button>
        <button class="btn btn-danger btn-sm" @click="remove(row.item, row.index)">
          <i class="fa fa-trash"></i>
        </button>
      </template>
    </b-table>
    <person-edit :show="showEdit" :draft="draft" @close="close" :positions="positions" :persontypes="persontypes"></person-edit>
  </div>
  <div class="box-footer text-center">
    <b-pagination :total-rows="totalRows" :per-page="perPage" align="center" v-model="currentPage" class="my-0" @input="getPersons" />
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      fields: [
        { key: 'id',            label: 'Id',                                  sortable: true },
        { key: 'fullname',      label: trans('bck.person.lbl_fullname'),      sortable: true },
        { key: 'email',         label: trans('bck.person.lbl_email'),         sortable: true },
        { key: 'birthdate',     label: trans('bck.person.lbl_birthday'),      sortable: true },
        { key: 'sex',           label: trans('bck.person.lbl_sex'),           sortable: true },
        { key: 'maritalstatus', label: trans('bck.person.lbl_maritalstatus'), sortable: true },
        { key: 'fulladdress',   label: trans('bck.person.lbl_fulladdress'),   sortable: true },
        { key: 'persontype',    label: trans('bck.person.lbl_persontype'),    sortable: true },
        { key: 'position',      label: trans('bck.person.lbl_position'),      sortable: true },
        { key: 'actions',       label: trans('bck.general.actions'),          sortable: true },
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
  mounted(){
    this.$store.dispatch('listPersontypes')
    this.$store.dispatch('listPositions')
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
        firstname: null,
        lastname: null,
        maritalstatus: null,
        birthday: null,
        sex: null,
        address: null,
        street: null,
        zipcode: null,
        city: null,
        email: null,
        cnt_emerg_name: null,
        cnt_emerg_phone: null,
        cnt_emerg_address: null,
        crt_employer_name: null,
        crt_employer_address: null,
        position_id: null,
        persontype_id: null,
        user_creac_id: null,
        user_modif_id: null,
        active: null,
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
      if (confirm(trans('bck.person.delete_confirm') + item.name + '?')) {
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
      let position = this.positions.find(position => position.id == id)
      return position.name;
    },
    personTypeName(item) {
      var id = item.persontype_id
      let persontype = this.persontypes.find(persontype => persontype.id = id)
      return persontype.name;
    },
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
    },
  }
}
</script>
