<template>
  <CRow>
    <CCol sm="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-grid"/>
          <h3 class="box-title">{{ trans('bck.person.title') }}</h3>          
        </CCardHeader>
        <CCardBody>
          <CDataTable :items="persons" :fields="fields" column-filter table-filter  items-per-page-select :items-per-page="5"  hover sorter  pagination >
            
            <template #status="{item}">
              <td>
                <CBadge :color="getBadge(item.status)">
                  {{item.status}}
                </CBadge>
              </td>
            </template>

            <template #show_details="{item, index}">
              <td class="py-2">
                <CButton color="primary" variant="outline" square  size="sm" @click="toggleDetails(index)" >
                  {{details.includes(index) ? 'Hide' : 'Show'}}
                </CButton>
              </td>
            </template>

            <template #details="{item, index}">
              <CCollapse :show="details.includes(index)">
                <CCardBody>
                  <CMedia :aside-image-props="{ height: 102 }">
                    <h4>{{item.profession_name }}</h4>
                    <p class="text-muted">Person Type: {{item.person_type_name }}</p>
                    <p class="text-muted">Church Position: {{item.position_name  }}</p>
                    <p class="text-muted">Profession: {{item.profession_name }}</p>
                    <p class="text-muted">Address: {{item.address}}, {{item.street}}, {{item.city}}, {{item.state}} {{item.postal_code}}</p>
                    <CButton size="sm" color="info" class="">
                     Send Text Message
                    </CButton>
                    <CButton size="sm" color="danger" class="ml-1">
                      Send Email
                    </CButton>
                    <CButton size="sm" color="danger" class="ml-1">
                      Related Family
                    </CButton>
                  </CMedia>
                  </CMedia>
                </CCardBody>
              </CCollapse>
            </template>


          </CDataTable> 
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>
<script>
// const usersData = [
//   { username: 'Samppa Nori', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Estavan Lykos', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Chetan Mohamed', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Derick Maximinus', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Friderik Dávid', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Yiorgos Avraamu', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Avram Tarasios', registered: '2012/02/01', role: 'Staff', status: 'Banned', _classes: 'table-success'},
//   { username: 'Quintin Ed', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Enéas Kwadwo', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Agapetus Tadeáš', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Carwyn Fachtna', registered: '2012/01/01', role: 'Member', status: 'Active', _classes: 'table-success'},
//   { username: 'Nehemiah Tatius', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Ebbe Gemariah', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Eustorgios Amulius', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Leopold Gáspár', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Pompeius René', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Paĉjo Jadon', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Micheal Mercurius', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Ganesha Dubhghall', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Hiroto Šimun', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Vishnu Serghei', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Zbyněk Phoibos', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Einar Randall', registered: '2012/02/01', role: 'Admin', status: 'Inactive', _classes: 'table-danger'},
//   { username: 'Félix Troels', registered: '2012/03/21', role: 'Staff', status: 'Active'},
//   { username: 'Aulus Agmundr', registered: '2012/01/01', role: 'Member', status: 'Pending'}
// ]


// const fields = [
//   { key: 'username', _style:'width:40%' }, 'registered',
//   { key: 'role', _style:'width:20%;' },
//   { key: 'status', _style:'width:20%;' },
//   { key: 'show_details', label: '', _style: 'width:1%', sorter: false, filter: false }
// ]

export default { 
  watch: {
    target() {
      this.getPersons()
    }
  },
  data () {
    return {    
      fields: [
        { key: 'id', label: trans('bck.person.lbl_fullname') },
        { key: 'fullname', label: trans('bck.person.lbl_fullname') },
        { key: 'email', label: trans('bck.person.lbl_email') },
        { key: 'phone', label: trans('bck.person.lbl_phone') },
        { key: 'birthdate', label: trans('bck.person.lbl_birthday') },
        { key: 'sex', label: trans('bck.person.lbl_sex'), },
        { key: 'marital_status', label: trans('bck.person.lbl_maritalstatus') },
        { key: 'fulladdress', label: trans('bck.person.lbl_fulladdress') },
        { key: 'person_type_name', label: trans('bck.person.lbl_persontype') },
        { key: 'position_name', label: trans('bck.person.lbl_position')},
        { key: 'profession_name', label: trans('bck.person.lbl_profession') },
        { key: 'actions', label: trans('bck.general.actions') }
      ],
      currentPage: null,
      draft: {},
      target: '',
      currentIndex: null,
      sortBy: 'id',
      sortDesc: true,
      showEdit: false
    }
  },
  created() {
    this.getPersons()
    this.$store.dispatch('listPosition')
    this.$store.dispatch('listProfession')
    this.$store.dispatch('listPersontype')
  },
  methods: {
    getBadge (status) {
      switch (status) {
        case true: return 'success'
        case false: return 'danger'     
        default: 'primary'
      }
    },
    toggleDetails (index) {
      const position = this.details.indexOf(index)
      position !== -1 ? this.details.splice(position, 1) : this.details.push(index)
    }, 
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
    positions() {
      return this.$store.state.Position.list
    },
    professions() {
      return this.$store.state.Profession.list
    }
  }
}
</script>