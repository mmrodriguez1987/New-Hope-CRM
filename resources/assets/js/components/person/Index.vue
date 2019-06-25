<template>
  <div className="animated">
    <b-card>
      <b-card-header>
        <i class="icon-menu mr-1"></i>Persons Database Management
      </b-card-header>
      <b-card-body>
        <v-client-table :columns="columns" :data="data" :options="options" :theme="theme" id="dataTable">
          <!-- <a slot="uri" slot-scope="props" target="_blank" :href="props.row.uri" class="icon-edit"></a>   -->
          <template slot="fullname" slot-scope="row">
            {{data.item.first_name}} {{row.item.last_name}}
          </template>

          <template slot="fulladdress" slot-scope="row">
            {{data.item.address}}, {{data.item.street}}, {{data.item.city}}, {{data.item.state}} {{row.item.postal_code}}
          </template>

          <span slot="actions" slot-scope="data"> 
            <button class="btn btn-info btn-sm" @click="edit(data.item, data.index)">
              <i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-danger btn-sm" @click="remove(data.item, data.index)">
              <i class="fa fa-trash-o"></i>
            </button>
          </span>    
        </v-client-table>
        <person-edit :show="showEdit" :draft="draft" @close="close"></person-edit>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import {ClientTable, Event} from 'vue-tables-2'

Vue.use(ClientTable)

export default {
  components: {
    ClientTable, Event
  },
  data: {
    columns: ['id', 'fullname', 'email', 'phone', 'birthdate','sex','marital_status','fulladdress','person_type_name','position_name','profession_name','actions'],
    data: getPersons(),
    options: {
      headings: {
        id: 'ID',
        fullname: 'Full Name',
        email: 'E-mail',
        phone: 'Phone',
        birthdate: 'birthdate',
        sex: 'Sex',
        marital_status: 'Marital Status',
        fulladdress: 'Full Address',
        person_type_name: 'Person Type',
        position_name: 'Position',
        profession_name: 'Profession',
        actions: 'Actions'
      },
      sortable: ['id', 'fullname', 'email', 'phone', 'birthdate','sex','marital_status','fulladdress','person_type_name','position_name','profession_name'],
      filterable: ['id', 'fullname', 'email', 'phone', 'birthdate','sex','marital_status','fulladdress','person_type_name','position_name','profession_name'],
      dateColumns:['birthdate'],
      dateFormat: 'MM-DD-YYYY',
      datepickerOptions: {
        showDropdowns: true,
        autoUpdateInput: true,
      },
      sortIcon: { base:'fa', up:'fa-sort-asc', down:'fa-sort-desc', is:'fa-sort' },
      pagination: {
        chunk: 15,
        edge: false,
        nav: 'scroll'
      },
      template: 'default',
      theme: 'bootstrap4'
    }
  },
  
  watch: {
    target() {
      this.getPersons()
    }
  },
  components: {
    ClientTable, Event
  },
  data: {
    columns: ['id', 'fullname', 'email', 'phone', 'birthdate','sex','marital_status','fulladdress','person_type_name','position_name','profession_name'],
    data: getPersons(),
    options: {
      headings: {
        id: 'ID',
        fullname: 'Full Name',
        email: 'E-mail',
        phone: 'Phone',
        birthdate: 'birthdate',
        sex: 'Sex',
        marital_status: 'Marital Status',
        fulladdress: 'Full Address',
        person_type_name: 'Person Type',
        position_name: 'Position',
        profession_name: 'Profession'
      },
      sortable: ['id', 'fullname', 'email', 'phone', 'birthdate','sex','marital_status','fulladdress','person_type_name','position_name','profession_name'],
      filterable: ['id', 'fullname', 'email', 'phone', 'birthdate','sex','marital_status','fulladdress','person_type_name','position_name','profession_name']
    }
  },
  created() {
    this.getPersons()
    this.$store.dispatch('listPosition')
    this.$store.dispatch('listProfession')
    this.$store.dispatch('listPersontype')
  },
  methods: {
    edit(person, index){
      this.draft = clone(person)
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
        cid: null,
        sex: null,
        address: null,
        street: null,       
        city: null,
        postal_code: null,
        email: null,
        phone: null,
        state: null,
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
    // sortingChanged(ctx) {
    //   if (ctx.sortBy) {
    //     this.sortBy = ctx.sortBy
    //     this.sortDesc = ctx.sortDesc
    //     this.currentPage = null
    //     this.getPersons()
    //   }
    // },
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
    positions() {
      return this.$store.state.Position.list
    },
    professions() {
      return this.$store.state.Profession.list
    }
  }
}
</script>

<style lang="scss">
  #dataTable {
    width: 95%;
    margin: 0 auto;

    .VuePagination {
      text-align: center;
      justify-content: center;
    }

    .vue-title {
      text-align: center ;
      margin-bottom: 10px;
    }

    .VueTables__search-field {
      display: flex;
    }
    .VueTables__search-field input {
      margin-left: 0.25rem;
    }

    .VueTables__limit-field {
      display: flex;
    }

    .VueTables__limit-field select {
      margin-left: 0.25rem !important;
    }

    .VueTables__table th {
      text-align: center;
    }

    // .VueTables__child-row-toggler {
    //   width: 16px;
    //   height: 16px;
    //   line-height: 16px;
    //   display: block;
    //   margin: auto;
    //   text-align: center;
    // }

    // .VueTables__child-row-toggler--closed::before {
    //   content: "+";
    // }

    // .VueTables__child-row-toggler--open::before {
    //   content: "-";
    // }
  }

</style>