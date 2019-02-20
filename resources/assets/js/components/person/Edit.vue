<template>
  <div>
    <b-modal v-model="show" size="lg" :title="draft.id ? trans('bck.person.edit') : trans('bck.person.add')" @hide="close" centered   class="modal-lg">
      <b-container fluid>
        <!-- First Name -->
        <b-row class="mb-1">          
          <b-col cols="2"> </b-col>           
          <b-col>
            <label :class="validFirstName ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_firstname')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.first_name" class="form-control">    
          </b-col>
        </b-row>

        <!-- Last Name -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>      
          <b-col>
              <label :class="validLastName ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_lastname')}}</label>
          </b-col>
          <b-col>
              <input type="text" v-model="draft.last_name" class="form-control">
          </b-col>
        </b-row>

        <!-- Birthday -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validBirthday ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_birthday')}}</label>
          </b-col>
          <b-col>            
            <input-date v-model="draft.birthday"></input-date>
          </b-col>      
        </b-row>

        <!-- CID -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>      
          <b-col>
              <label :class="validCID ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cid')}}</label>
          </b-col>
          <b-col>
              <input type="text" v-model="draft.cid" class="form-control">
          </b-col>
        </b-row>

          
        <!-- Marital Status -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validMaritalStaus ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_maritalstatus')}}</label>
          </b-col>
          <b-col>
            <b-form-select v-model="draft.marital_status" :options="maritalstatus" class="mb-3" />
          </b-col>
        </b-row>

        <!-- Email -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validEmail ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_email')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.email" class="form-control">
          </b-col>
        </b-row>

        <!-- Sex -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validSex ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_sex')}}</label>
          </b-col>
          <b-col>            
            <input type="text" v-model="draft.sex" class="form-control">
          </b-col>
        </b-row>

        <!-- Adress -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validAddress ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_address')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.address" class="form-control">
          </b-col>
        </b-row>

        <!-- Street -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validStreet ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_street')}}</label></b-col>
          <b-col>
            <input type="text" v-model="draft.street" class="form-control">
          </b-col>
        </b-row>

        <!-- City -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validCity ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_city')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.city" class="form-control">
          </b-col>
        </b-row>

        <!-- Zip Code -->
        <b-row class="mb-1">
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validZIPCode ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_zipcode')}}</label>
          </b-col>
          <b-col>
            <input type="number" v-model="draft.postal_code" class="form-control">
          </b-col>
        </b-row>

        <!-- State -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validState ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_state')}}</label>
          </b-col>
          <b-col>
            <b-form-select v-model="draft.state" :options="states" class="mb-3" />
          </b-col>
        </b-row>

        <!-- Contact Emergency Name -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validCntcEmrgName ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cnt_emerg_name')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.cnt_emerg_name" class="form-control">
          </b-col>
        </b-row>

        <!-- Contact Emergency Phone -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validCntcEmrgPhone ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cnt_emerg_phone')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.cnt_emerg_phone" class="form-control">
          </b-col>
        </b-row>

        <!-- Contact Emergency Address -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label :class="validCntcEmrgAddress ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cnt_emerg_address')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.cnt_emerg_address" class="form-control">
          </b-col>
        </b-row>

        <!-- Employer Name -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label class="label-valid">{{trans('bck.person.lbl_crt_employer_name')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.crt_employer_name" class="form-control">
          </b-col>
        </b-row>

        <!-- Employer Phone -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label class="label-valid">{{trans('bck.person.lbl_crt_employer_phone')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.crt_employer_phone" class="form-control">
          </b-col>
        </b-row>

        <!-- Employer Address -->
        <b-row>
          <b-col cols="2"> </b-col>
          <b-col>
            <label class="label-valid">{{trans('bck.person.lbl_crt_employer_address')}}</label>
          </b-col>
          <b-col>
            <input type="text" v-model="draft.crt_employer_address" class="form-control">
          </b-col>
        </b-row>

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