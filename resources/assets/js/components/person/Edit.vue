<template>
<div>
  <b-modal v-model="show" :title="draft.id ? trans('bck.person.edit') : trans('bck.person.add')" @hide="close">
    <b-container fluid>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validFirstName ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_firstname')}}</label></b-col>
        <b-col><input type="text" v-model="draft.firstname" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validLastName ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_lastname')}}</label></b-col>
        <b-col><input type="text" v-model="draft.lastname" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validBirthday ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_birthday')}}</label></b-col>
        <b-col>
          <datepicker v-model="draft.birthday" input-class="form-control" />
        </b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validMaritalStaus ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_maritalstatus')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.maritalstatus" :options="maritalstatus" class="mb-3" /></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validEmail ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_email')}}</label></b-col>
        <b-col><input type="text" v-model="draft.email" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validSex ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_sex')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.sex" :options="sex" class="mb-3" />
        </b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validAddress ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_address')}}</label></b-col>
        <b-col><input type="text" v-model="draft.address" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validStreet ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_street')}}</label></b-col>
        <b-col><input type="text" v-model="draft.street" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCity ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_city')}}</label></b-col>
        <b-col><input type="text" v-model="draft.city" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validZIPCode ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_zipcode')}}</label></b-col>
        <b-col><input type="number" v-model="draft.zipcode" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validState ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_state')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.state" :options="states" class="mb-3" /></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCntcEmrgName ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cnt_emerg_name')}}</label></b-col>
        <b-col><input type="text" v-model="draft.cnt_emerg_name" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCntcEmrgPhone ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cnt_emerg_phone')}}</label></b-col>
        <b-col><input type="text" v-model="draft.cnt_emerg_phone" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCntcEmrgAddress ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_cnt_emerg_address')}}</label></b-col>
        <b-col><input type="text" v-model="draft.cnt_emerg_address" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label class="label-valid">{{trans('bck.person.lbl_crt_employer_name')}}</label></b-col>
        <b-col><input type="text" v-model="draft.crt_employer_name" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label class="label-valid">{{trans('bck.person.lbl_crt_employer_address')}}</label></b-col>
        <b-col><input type="text" v-model="draft.crt_employer_address" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validPosition ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_position')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.position_id" :options="options_positions" class="mb-1" /></b-col>
      </b-row>  
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validPersonType ? 'label-valid' : 'label-required'">{{trans('bck.person.lbl_persontype')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.persontype_id" :options="options_persontypes" class="mb-1" /></b-col>
      </b-row>
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
  props: ['show', 'draft', 'positions', 'persontypes'],
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
      this.$store.dispatch('updatePerson', {
        id: id,
        draft
      })
    },
    store() {
      this.$store.dispatch('storePerson', this.draft)
    },
  },
  computed: {
    validForm() {
      return this.validFirstName && this.validLastName && this.validEmail && this.validBirthday && this.validCntcEmrgName && this.validCntcEmrgAddress &&
        this.validAddress && this.validPhone && this.validMaritalStaus && this.validStreet && this.validCity && this.validCntcEmrgPhone &&
        this.validSex && this.validZIPCode && this.validState && this.validPhone && this.validPosition && this.validPersonType
    },
    validFirstName() {
      return this.draft.firstname ? this.draft.firstname.length > 3 : false
    },
    validLastName() {
      return this.draft.lastname ? this.draft.lastname.length > 3 : false
    },
    validBirthday() {
      var moment = require('moment')
      var today = moment.now
      var birthday = moment(this.draft.birthday)
      return this.draft.birthday ? today.diff(birthday, 'day') > 0 : false
    },
    validMaritalStaus() {
      return this.draft.maritalstatus != null
    },
    validEmail() {
      var re = /\S+@\S+\.\S+/
      return re.test(this.draft.email)
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
      var result = [{value: null, text: trans('bck.person.select_position')}]
      for (var i = 0; i < this.positions.length; i++) {
        result.push({value: this.positions[i].id,text: this.positions[i].name
        })
      }
      return result
    },
    options_persontypes() {
      var result = [{value: null,text: trans('bck.person.select_persontype')}]
      for (var i = 0; i < this.persontypes.length; i++) {
        result.push({value: this.persontypes[i].id,text: this.persontypes[i].name})
      }
      return result
    }
  }
}
</script>
