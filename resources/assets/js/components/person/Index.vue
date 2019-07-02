<template>
  <b-card header="Persons Database Management">
    <b-container fluid>
      <b-row>
        <b-col md="4" class="my-1">
          <b-form-group label-cols-sm="2" label="Filter" class="mb-0">
            <b-input-group>
              <b-form-input v-model="target" :placeholder="Search"  @keyup.enter="getPersons"></b-form-input>              
            </b-input-group>
          </b-form-group>
        </b-col>   
        <b-col md="8" class="my-1">
          <button type="button" class="btn btn-success mb-2 pull-right" title="Add" @click="create">
            <i class="fa fa-plus"></i>           
          </button>
        </b-col>
      </b-row>

      <b-table bordered striped hover :items="persons" :fields="fields" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc"  @sort-changed="sortingChanged" >       
        <template slot="fullname" slot-scope="row">
          {{row.item.first_name}} {{row.item.last_name}}
        </template>
        
        <template slot="actions" slot-scope="row">            
          <button class="btn btn-info btn-sm" title="Edit Person Details" @click="edit(row.item, row.index)" >
            <i class="fa fa-pencil"></i>
          </button>
          <button class="btn btn-danger btn-sm" title="Remove" @click="remove(row.item, row.index)">
            <i class="fa fa-trash"></i>
          </button>
          <button class="btn btn-success btn-sm" title="Show Details" @click="row.toggleDetails">
            <i class="fa fa-plus-square"></i>
          </button>
        </template>

        <template slot="row-details" slot-scope="row">       
          <b-card>
            <b-row class="mb-2">
              <b-col sm="3" class="text-sm-left"><b>Address:</b></b-col>
              <b-col> {{row.item.address}}, {{row.item.street}}, {{row.item.city}}, {{row.item.state}} {{row.item.postal_code}}</b-col>
            </b-row>

            <b-row class="mb-2">
              <b-col sm="3" class="text-sm-right"><b>Person Type:</b></b-col>
              <b-col>{{ row.item.person_type_name }}</b-col>
            </b-row>

            <b-row class="mb-2">
              <b-col sm="3" class="text-sm-right"><b>Position:</b></b-col>
              <b-col>{{ row.item.position_name }}</b-col>
            </b-row>
            
            <b-row class="mb-2">
              <b-col sm="3" class="text-sm-right"><b>Profession:</b></b-col>
              <b-col>{{ row.item.profession_name }}</b-col>
            </b-row>

            <b-button size="sm" @click="row.toggleDetails" Title="Hide">
              <i class="fa fa-minus"></i>
            </b-button>
            <b-button class="btn btn-success btn-sm" size="sm" title="Send Text Message">
               <i class="fa fa-paper-plane"></i>
            </b-button>
            <b-button class="btn btn-success btn-sm" size="sm" title="Send Email">
               <i class="fa fa-envelope-o"></i>
            </b-button>
            <b-button class="btn btn-success btn-sm" size="sm" title="Related Familty">
               <i class="fa fa-users"></i>
            </b-button>
          </b-card>
        </template>
      </b-table>
      
      <b-row>
        <b-col md="6" class="my-1">
          <b-pagination :total-rows="totalRows" :per-page="perPage" align="center" v-model="currentPage" class="my-0" @input="getPersons"></b-pagination>
        </b-col>
      </b-row>
      <personEdit :show="showEdit" :draft="draft" @close="close"></personEdit>
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
          label: 'Full Name', 
          sortable: true 
        },
        { 
          key: 'email', 
          label: 'E-mail', 
          sortable: true 
        },
        {
          key: 'phone', 
          label: 'Phone', 
          sortable: true 
        },
        { 
          key: 'birthdate', 
          label: 'Birthday', 
          sortable: true 
        },
        { 
          key: 'sex', 
          label: 'Sex', 
          sortable: true 
        },
        { 
          key: 'marital_status', 
          label: 'Marital Status', 
          sortable: true 
        },       
        { 
          key: 'actions', 
          label: 'Actions' 
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
      

      Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        type: 'error',
        confirmButtonText: 'Cool'
      })
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