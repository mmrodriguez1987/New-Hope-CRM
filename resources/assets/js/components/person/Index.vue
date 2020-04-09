<template>
  <CRow>
    <CCol sm="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-grid"/>
          <h3 class="box-title">{{ trans('bck.person.title') }}</h3>          
        </CCardHeader>
        <CCardBody>
          <CDataTable :items="persons" :fields="fields"  :striped="striped" :dark="dark" pagination >
             
             
             <template slot="fullname" slot-scope="row">
                <td>
              {{row.item.first_name}} {{row.item.last_name}}
               </td>
            </template>

            

            <template slot="status" slot-scope="row">
              <td>
                <CBadge :color="getBadge( row.item.active)">
                  {{row.item.active}}
                </CBadge>
              </td>
            </template>

            <template slot="show_details" slot-scope="row">
              <td class="py-2">
                <CButton color="primary" variant="outline" square  size="sm" @click="row.toggleDetails" >
                   <i class="fa fa-plus-square"></i>
                </CButton>
              </td>
            </template>

          <template slot="row-details" slot-scope="row">
              <CCollapse>
                <CCardBody>
                  <CMedia :aside-image-props="{ height: 102 }">
                    <h4>{{ row.item.profession_name }}</h4>
                    <p class="text-muted">Person Type: {{ row.item.person_type_name }}</p>
                    <p class="text-muted">Church Position: {{ row.item.position_name  }}</p>
                    <p class="text-muted">Profession: {{ row.item.profession_name }}</p>
                    <p class="text-muted">Address: {{ row.item.address}}, {{ row.item.street}}, {{ row.item.city}}, {{ row.item.state}} {{ row.item.postal_code}}</p>
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

export default { 
  watch: {
    target() {
      this.getPersons()
    }
  },
  data () {
    return {    
      fields: [
        { key: 'status', _style:'width:20%;' },
        { key: 'id', label: trans('bck.person.lbl_fullname') },
        { key: 'fullname', label: trans('bck.person.lbl_fullname') },
        { key: 'email', label: trans('bck.person.lbl_email') },
        { key: 'phone', label: trans('bck.person.lbl_phone') },
        { key: 'birthdate', label: trans('bck.person.lbl_birthday') },
        { key: 'sex', label: trans('bck.person.lbl_sex'), },
        { key: 'marital_status', label: trans('bck.person.lbl_maritalstatus') },     
        { key: 'actions', label: trans('bck.general.actions') },
        { key: 'show_details', label: '', _style: 'width:1%',  sorter: false,   filter: false }

      ],
      currentPage: null,
      draft: {},
      target: '',
      currentIndex: null,
      sortBy: 'id',
      sortDesc: true,
      showEdit: false,
      rows: 10,
      details: []

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
        case 1: return 'success'
        case 0: return 'danger'     
        default: 'primary'
      }
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
        target: this.target,
        orderBy: this.sortBy,
        desc: this.sortDesc,
        rows: this.rows
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
    toggleDetails (index) {
      const position = this.details.indexOf(index)
      position !== -1 ? this.details.splice(position, 1) : this.details.push(index)
    }
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