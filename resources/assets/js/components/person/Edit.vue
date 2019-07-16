<template>
  <div>
    <b-modal v-model="show" size="lg" :title="draft.id ? 'Edit Person' : 'Add Person'" @hide="close" centered  class="modal fade">
      <b-container fluid>
        <!-- First Name  -->
        <b-form-group 
            :description="trans('bck.person.lbl_desc_firstname')" 
            :label="trans('bck.person.lbl_firstname')" 
            label-for="firstName" 
            :label-cols="3">
          <b-form-input id="firstName" type="text" v-model="draft.first_name" />  
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>
        </b-form-group>

        <!-- Last Name  -->
        <b-form-group 
            :description="trans('bck.person.lbl_desc_lastname')" 
            :label="trans('bck.person.lbl_lastname')" 
            label-for="lastname" 
            :label-cols="3">
          <b-form-input id="lastname" type="text" v-model="draft.last_name" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

         <!-- Birthday  -->
        <b-form-group 
            :description="trans('bck.person.lbl_desc_birthday')" 
            :label="trans('bck.person.lbl_birthday')" 
            label-for="birthday" 
            :label-cols="3">
          <b-form-input id="birthday" type="date" v-model="draft.birthday" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- CID  -->
        <b-form-group 
            :description="trans('bck.person.lbl_desc_cid')" 
            :label="trans('bck.person.lbl_cid')" 
            label-for="cid" 
            :label-cols="3">
          <b-form-input id="cid" type="text" v-model="draft.cid" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Marital Status  -->
        <b-form-group 
            :description="trans('bck.person.lbl_desc_maritalstatus')" 
            :label="trans('bck.person.lbl_maritalstatus')" 
            label-for="maritalstatus" 
            :label-cols="3">
          <b-form-input id="maritalstatus" type="text" v-model="draft.maritalstatus" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Email  -->
        <b-form-group 
            :description="trans('bck.person.lbl_desc_email')" 
            :label="trans('bck.person.lbl_email')" 
            label-for="email" 
            :label-cols="3">
          <b-form-input id="email" type="text" v-model="draft.email" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Sex -->
        <b-form-group            
            :label="trans('bck.person.lbl_sex')" 
            label-for="sex" 
            :label-cols="3">
          <b-form-input id="sex" type="text" v-model="draft.sex" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

         <!-- Address  -->
        <b-form-group            
            :label="trans('bck.person.lbl_address')" 
            label-for="address" 
            :label-cols="3">
          <b-form-input id="address" type="text" v-model="draft.address" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

       
        <!-- Street  -->
        <b-form-group            
            :label="trans('bck.person.lbl_street')" 
            label-for="street" 
            :label-cols="3">
          <b-form-input id="street" type="text" v-model="draft.street" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- City  -->
        <b-form-group            
            :label="trans('bck.person.lbl_city')" 
            label-for="city" 
            :label-cols="3">
          <b-form-input id="city" type="text" v-model="draft.city" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Zipcode  -->
        <b-form-group            
            :label="trans('bck.person.lbl_zipcode')" 
            label-for="zipcode" 
            :label-cols="3">
          <b-form-input id="zipcode" type="number" v-model="draft.postal_code" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

         <!-- state  -->
        <b-form-group            
            :label="trans('bck.person.lbl_state')" 
            label-for="state" 
            :label-cols="3">
          <b-form-select id="state" v-model="draft.state" :options="states"  />
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>
       
    
        <!-- Contact Emergency Name  -->
        <b-form-group            
            :label="trans('bck.person.lbl_cnt_emerg_name')" 
            label-for="cnt_emerg_name" 
            :label-cols="3">
          <b-form-input id="cnt_emerg_name" type="text" v-model="draft.cnt_emerg_name" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>


         <!-- Contact Emergency Phone  -->
        <b-form-group            
            :label="trans('bck.person.lbl_cnt_emerg_phone')" 
            label-for="cnt_emerg_phone" 
            :label-cols="3">
          <b-form-input id="cnt_emerg_phone" type="text" v-model="draft.cnt_emerg_phone" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Contact Emergency Address  -->
        <b-form-group            
            :label="trans('bck.person.lbl_cnt_emerg_address')" 
            label-for="cnt_emerg_address" 
            :label-cols="3">
          <b-form-input id="cnt_emerg_address" type="text" v-model="draft.cnt_emerg_address" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Employer Name  -->
        <b-form-group            
            :label="trans('bck.person.lbl_crt_employer_name')" 
            label-for="crt_employer_name" 
            :label-cols="3">
          <b-form-input id="crt_employer_name" type="text" v-model="draft.crt_employer_name" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Employer Phone  -->
        <b-form-group            
            :label="trans('bck.person.lbl_crt_employer_phone')" 
            label-for="crt_employer_phone" 
            :label-cols="3">
          <b-form-input id="crt_employer_phone" type="text" v-model="draft.crt_employer_phone" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- Employer Address  -->
        <b-form-group            
            :label="trans('bck.person.lbl_crt_employer_address')" 
            label-for="crt_employer_address" 
            :label-cols="3">
          <b-form-input id="crt_employer_address" type="text" v-model="draft.crt_employer_address" /> 
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>

        <!-- position  -->
        <b-form-group            
            :label="trans('bck.person.lbl_position')" 
            label-for="position" 
            :label-cols="3">
          <b-form-select id="position" v-model="draft.position_id" :options="options_positions" class="mb-1" />
          <b-form-invalid-feedback >
            {{trans('bck.general.required')}}
          </b-form-invalid-feedback>             
        </b-form-group>



        <!-- Position -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validPosition ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_position')}}</label>
          </b-col>
          <b-col>
            <b-form-select v-model="draft.position_id" :options="options_positions" class="mb-1" />
          </b-col>
        </b-row>  

        <!-- Person Type -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validPersonType ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_persontype')}}</label>
          </b-col>
          <b-col>
            <b-form-select v-model="draft.persontype_id" :options="options_persontypes" class="mb-1" />
          </b-col>
        </b-row>

        <!-- Profession ID -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validPersonType ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_persontype')}}</label>
          </b-col>
          <b-col>
            <b-form-select v-model="draft.profession_id" :options="options_professions" class="mb-1" />
          </b-col>
        </b-row>

        <!-- Active -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col><label class="label-valid">{{trans('bck.general.active')}}</label></b-col>
          <b-col>
            <b-form-checkbox v-model="draft.active" value="true" unchecked-value="false" class="mb-1" /></b-col>
        </b-row>        
      </b-container>
      <div slot="modal-footer">
        <b-btn variant="success" @click="save" :disabled="!validForm"> {{trans('bck.general.save')}}</b-btn>
        <b-btn variant="danger" @click="close"> {{trans('bck.general.close')}}</b-btn>
      </div>
    </b-modal>
  </div>
</template>
<script>
export default {
  props: ['show', 'draft', 'positions', 'personTypes', 'professions'],
  data() {
    return {
      sex: [ // ordenar este codigo
        { value: null, text: trans('bck.general.select')},
        { value: 'M',  text: trans('bck.general.male')},
        { value: 'F',  text: trans('bck.general.female')}
      ],
      maritalstatus: [
        { value: null, text: trans('bck.general.select')},
        { value: 'married', text: trans('bck.ms.married')},
        { value: 'single', text: trans('bck.ms.single')},
        { value: 'widower', text: trans('bck.ms.widower')},
        { value: 'divorced', text: trans('bck.ms.divorced')},
        { value: 'cohabitant', text: trans('bck.ms.cohabitant')},
      ],
      //Estados de USA
      states: [
        { value: null, text: trans('bck.general.select')},
        { value: 'FL', text: trans('bck.states.FL')},
        { value: 'AL', text: trans('bck.states.AL')},
        { value: 'AK', text: trans('bck.states.AK')},
        { value: 'AZ', text: trans('bck.states.AZ')},
        { value: 'AR', text: trans('bck.states.AR')},
        { value: 'CA', text: trans('bck.states.CA')},
        { value: 'NC', text: trans('bck.states.NC')},
        { value: 'SC', text: trans('bck.states.SC')},
        { value: 'CO', text: trans('bck.states.CO')},
        { value: 'CT', text: trans('bck.states.CT')},
        { value: 'ND', text: trans('bck.states.ND')},
        { value: 'SD', text: trans('bck.states.SD')},
        { value: 'DE', text: trans('bck.states.DE')},
        { value: 'DC', text: trans('bck.states.DC')},
        { value: 'GA', text: trans('bck.states.GA')},
        { value: 'HI', text: trans('bck.states.HI')},
        { value: 'ID', text: trans('bck.states.ID')},
        { value: 'IL', text: trans('bck.states.IL')},
        { value: 'IN', text: trans('bck.states.IN')},
        { value: 'IA', text: trans('bck.states.IA')},
        { value: 'KS', text: trans('bck.states.KS')},
        { value: 'KY', text: trans('bck.states.KY')}
      ],
      labels: [
        { value: 'first_name', text: trans('bck.person.lbl_firstname')},
        { value: 'desc_first_name', text: trans('bck.person.lbl_desc_firstname')},
        { value: 'last_name', text: trans('bck.person.lbl_lastname')},
        { value: 'birtday', text: trans('bck.person.lbl_birthday')},
        { value: 'cid', text: trans('bck.person.lbl_cid')},
        { value: 'maritalstatus', text: trans('bck.person.lbl_maritalstatus')},
        { value: 'email', text: trans('bck.person.lbl_email')},
        { value: 'sex', text: trans('bck.person.lbl_sex')},
        { value: 'address', text: trans('bck.person.lbl_address')},
        { value: 'street', text: trans('bck.person.lbl_street')},
        { value: 'city', text: trans('bck.person.lbl_city')},
        { value: 'zipcode', text: trans('bck.person.lbl_zipcode')},
        { value: 'state', text: trans('bck.person.lbl_state')},
        { value: 'name', text: trans('bck.person.lbl_state')},
        { value: 'cnt_emerg_name', text: trans('bck.person.lbl_cnt_emerg_name')},
        { value: 'cnt_emerg_phone', text: trans('bck.person.lbl_cnt_emerg_phone')},
        { value: 'cnt_emerg_address', text: trans('bck.person.lbl_cnt_emerg_address')},
        { value: 'crt_employer_name', text: trans('bck.person.lbl_crt_employer_name')},
        { value: 'crt_employer_phone', text: trans('bck.person.lbl_crt_employer_phone')},
        { value: 'crt_employer_address', text: trans('bck.person.lbl_crt_employer_address')},
        { value: 'person_type', text: trans('bck.person.lbl_persontype')},
        { value: 'position', text: trans('bck.person.lbl_position')},
        { value: 'profession', text: trans('bck.person.lbl_profession')}

      ]     
    }
  },
  methods: {
    close() {
      this.$emit('close')
    },
    save() {
      if (this.draft.id) {
        this.update()
      } else {
        this.store()
      }
      this.close()
    },
    update() {
      var draft = this.draft
      var id = this.draft.id
      this.$store.dispatch('updatePerson', {id:this.draft.id, draft: this.draft})
    },
    store() {
      this.$store.dispatch('storePerson', this.draft)
    },
  },
  computed: {
    validForm() {
      return this.validFirstName && 
        this.validLastName && 
        this.validEmail && 
        this.validBirthday && 
        this.validCntcEmrgName && 
        this.validCntcEmrgAddress &&
        this.validAddress &&
        this.validPhone && 
        this.validMaritalStaus &&
        this.validStreet && 
        this.validCity && 
        this.validCntcEmrgPhone &&
        this.validSex && 
        this.validZIPCode && 
        this.validCID &&
        this.validState && 
        this.validPhone && 
        this.validPosition && 
        this.validPersonType &&
        this.validProfession
    },
    validProfession() {
      return this.draft.profession_id != null
    },
    validFirstName() {
      return this.draft.first_name ? this.draft.first_name.length > 3 : false
    },
    validLastName() {
      return this.draft.last_name ? this.draft.last_name.length > 3 : false
    },
    validBirthday() {
      var moment = require('moment')
      var today = moment.now
      var birthday = moment(this.draft.birthday)
      return this.draft.birthday ? today.diff(birthday, 'day') > 0 : false
    },
    validMaritalStaus() {
      return this.draft.marital_status != null
    },
    validEmail() {
      var re = /\S+@\S+\.\S+/
      return re.test(this.draft.email)
    },
    validCID() {
      return this.draft.cid ? this.draft.cid.length > 3 : false
    },
    validCntcEmrgPhone() {
      return this.draft.cnt_emerg_phone != null
    },
    validAddress() {
      return this.draft.address != null
    },
    validStreet() {
      return this.draft.street != null
    },
    validCntcEmrgName() {
      return this.draft.cnt_emerg_name != null
    },
    validCity() {
      return this.draft.city != null
    },
    validCntcEmrgAddress() {
      return this.draft.cnt_emerg_address != null
    },
    validSex() {
      return this.draft.sex != null
    },
    validZIPCode() {
      return this.draft.zipcode ? this.draft.zipcode > 30000 : false
    },
    validState() {
      return this.draft.state != null
    },
    validPhone() {
      return this.draft.phone != null
    },
    validPosition() {
      return this.draft.position_id != null
    },
    validPersonType() {
      return this.draft.persontype_id != null
    },
    options_positions() {     
      return this.positions
    },
    options_persontypes() {
      return this.personTypes      
    }, 
    options_professions() {
      return this.professions
     
    },
  }
}
</script>