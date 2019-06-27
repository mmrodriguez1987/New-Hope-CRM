<template>
  <b-card :header="trans('bck.person.title')">
    <b-container fluid>
      <b-row>
        <b-col md="4" class="my-1">
          <b-form-group label-cols-sm="2" label="Filter" class="mb-0">
            <b-input-group>
              <b-form-input v-model="target" :placeholder="trans('bck.general.search')"  @keyup.enter="getPersons"></b-form-input>              
            </b-input-group>
          </b-form-group>
        </b-col>   
        <b-col md="8" class="my-1">
          <button type="button" class="btn btn-success mb-2 pull-right" @click="create">
            <i class="fa fa-plus"></i>           
          </button>
        </b-col>
      </b-row>

      <b-table bordered striped hover :items="persons" :fields="fields" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc"  @sort-changed="sortingChanged" >       
        <template slot="fullname" slot-scope="row">
          {{row.item.first_name}} {{row.item.last_name}}
        </template>
        <template slot="fulladdress" slot-scope="row">
          {{row.item.address}}, {{row.item.street}}, {{row.item.city}}, {{row.item.state}} {{row.item.postal_code}}
        </template>
        <template slot="actions" slot-scope="row">            
          <button class="btn btn-info btn-sm" ><!-- @click="edit(row.item, row.index)"-->
            <i class="fa fa-pencil"></i>
          </button>
          <button class="btn btn-danger btn-sm" @click="remove(row.item, row.index)">
            <i class="fa fa-trash"></i>
          </button>
        </template>
      </b-table>
      
      <b-row>
        <b-col md="6" class="my-1">
          <b-pagination :total-rows="totalRows" :per-page="perPage" align="center" v-model="currentPage" class="my-0" @input="getPersons"></b-pagination>
        </b-col>
      </b-row>
      <!-- <personEdit :show="showEdit" :draft="draft" @close="close"></personEdit> -->
    </b-container>
  </b-card>
</template>

<script>
export default {
  watch: {
    target() {
      this.getPersons()
    }
  },
  data() {
    return {
      fields: [
        { 
          key: 'id', 
          label: 'ID',
          sortable: true 
        },
        { 
          key: 'fullname', 
          label: trans('bck.person.lbl_fullname'), 
          sortable: true 
        },
        { 
          key: 'email', 
          label: trans('bck.person.lbl_email'), 
          sortable: true 
        },
        {
          key: 'phone', 
          label: trans('bck.person.lbl_phone'), 
          sortable: true 
        },
        { 
          key: 'birthdate', 
          label: trans('bck.person.lbl_birthday'), 
          sortable: true 
        },
        { 
          key: 'sex', 
          label: trans('bck.person.lbl_sex'), 
          sortable: true 
        },
        { 
          key: 'marital_status', 
          label: trans('bck.person.lbl_maritalstatus'), 
          sortable: true 
        },
        { 
          key: 'fulladdress', 
          label: trans('bck.person.lbl_fulladdress'), 
          sortable: true 
        },
        { 
          key: 'person_type_name', 
          label: trans('bck.person.lbl_persontype'), 
          sortable: true 
        },
        { 
          key: 'position_name', 
          label: trans('bck.person.lbl_position'),
          sortable: true 
        },
        { 
          key: 'profession_name', 
          label: trans('bck.person.lbl_profession'), 
          sortable: true 
        },
        { 
          key: 'actions', 
          label: trans('bck.general.actions') 
        }
      ],
      currentPage: null,
      draft: {},
      target: '',
      currentIndex: null,
      sortBy: 'id',
      sortDesc: true
    }
  },
  created() {
    this.getPersons()
  },
  methods: {
    edit(item, index){
      this.draft = clone(post)
      this.currentIndex = index
      this.showEdit = true 
    },
    create() {
      this.draft = {
        id: null,
        first_name: null,
        last_name: null,
        marital_status: null,
        birthday: null,
        sex: null,
        address: null,
        street: null,
        cid: null,
        city: null,
        postal_code: null,
        email: null,
        phone: null,
        cnt_emerg_name: null,
        cnt_emerg_phone: null,
        cnt_emerg_address: null,
        crt_employer_name: null,
        crt_employer_phone: null,
        crt_employer_address: null,
        position_id: null,
        persontype_id: null,
        profession_id: null,
        active: null
      }
      this.showEdit = true
    },
    getPersons() {
      let params = { 
        page: this.currentPage, 
        target: this.target      
      }
      this.$store.dispatch('getPersons', params)
    },
    close() {
      this.showEdit = false
    },
    remove(item) {
      if (confirm(trans("bck.person.delete_confirm") + item.name + "?")) {
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
    getPositionName(index) {   
      //var id = item.position_id
      let position = this.positions.find(position => position.id == index)
      return position.name
    },
    getPersonTypeName(index) {
      //var id = item.persontype_id
      let persontype = this.persontypes.find(persontype => persontype.id == index)
      console.log('The name is: ' + persontype.name )
      return persontype.name
    },
  },
  computed: {
    persons() {
      return this.$store.state.Person.persons
    },
    current_page() {
      return this.$store.state.Person.currentPage
    },
    totalRows() {
      return this.$store.state.Person.totalRows
    },
    perPage() {
      return this.$store.state.Person.perPage
    },
    loading() {
      return this.$store.state.Person.loading
    },
    personTypes() {
      return this.$store.state.PersonType.list
    },
    position() {
      return this.$store.state.Position.list
    }
  }
}
</script>