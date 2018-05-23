<template>
<div>
  <b-modal v-model="show" :title="draft.id ? trans('backend.person.edit') : trans('backend.person.add')" @hide="close">
    <b-container fluid>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validFirstName ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_firstname')}}</label></b-col>
        <b-col><input type="text" v-model="draft.firstname" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validLastName ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_lastname')}}</label></b-col>
        <b-col><input type="text" v-model="draft.lastname" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="label-valid">{{trans('backend.person.lbl_birthday')}}</label></b-col>
        <b-col>
          <datepicker v-model="draft.birthday" language="en" input-class="form-control" />
        </b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validMaritalStaus ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_maritalstatus')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.maritalstatus" :options="maritalstatus" class="mb-3" />
        </b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validEmail ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_email')}}</label></b-col>
        <b-col><input type="text" v-model="draft.email" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validSex ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_sex')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.sex" :options="sex" class="mb-3" /></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validAddress ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_address')}}</label></b-col>
        <b-col><input type="text" v-model="draft.address" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validStreet ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_street')}}</label></b-col>
        <b-col><input type="text" v-model="draft.street" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCity ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_city')}}</label></b-col>
        <b-col><input type="text" v-model="draft.city" class="form-control"></b-col>
      </b-row>
      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validZIPCode ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_zipcode')}}</label></b-col>
        <b-col><input type="number" v-model="draft.zipcode" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col>
          <label :class="validState ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_state')}}</label>
        </b-col>
        <b-col>
          <b-form-select v-model="draft.state" :options="states" class="mb-3" />
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCntcEmrgName ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_cnt_emerg_name')}}</label></b-col>
        <b-col><input type="text" v-model="draft.cnt_emerg_name" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCntcEmrgPhone ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_cnt_emerg_phone')}}</label></b-col>
        <b-col><input type="text" v-model="draft.cnt_emerg_phone" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCntcEmrgAddress ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_cnt_emerg_address')}}</label></b-col>
        <b-col><input type="text" v-model="draft.cnt_emerg_address" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCrtEmpName ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_crt_employer_name')}}</label></b-col>
        <b-col><input type="text" v-model="draft.crt_employer_name" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col><label :class="validCrtEmpAddress ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_crt_employer_address')}}</label></b-col>
        <b-col><input type="text" v-model="draft.crt_employer_address" class="form-control"></b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col>
          <label :class="validPosition ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_position')}}</label>
        </b-col>
        <b-col>
          <b-form-select v-model="draft.position_id" :options="get_positions" class="mb-1" />
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="2"> </b-col>
        <b-col>
          <label :class="validPersonType ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_persontype')}}</label>
        </b-col>
        <b-col>
          <b-form-select v-model="draft.persontype_id" :options="get_persontypes" class="mb-1" />
        </b-col>
      </b-row>

      <b-row>
        <b-col cols="2"> </b-col>
        <b-col>
          <label class="label-valid">{{trans('backend.general.active')}}</label>
        </b-col>
        <b-col>
          <b-form-checkbox v-model="draft.active" value="true" unchecked-value="false" class="mb-1" />
        </b-col>
      </b-row>

    </b-container>
    <div slot="modal-footer">
      <b-btn variant="success" @click="save" :disabled="!validForm"> {{trans('backend.general.save')}}</b-btn>
      <b-btn variant="danger" @click="close"> {{trans('backend.general.close')}}</b-btn>
    </div>
  </b-modal>
</div>
</template>

<script>
export default {
  props: ['show', 'draft', 'positions', 'persontypes'],
  data() {
    return {
      maritalstatus: [{
        value: null,
        text: trans('backend.general.select')
      }, {
        value: 'married',
        text: trans('backend.ms.married')
      }, {
        value: 'single',
        text: trans('backend.ms.single')
      }, {
        value: 'widower',
        text: trans('backend.ms.widower')
      }, {
        value: 'divorced',
        text: trans('backend.ms.divorced')
      }, {
        value: 'cohabitant',
        text: trans('backend.ms.cohabitant')
      }, ],
      //Estados de USA
      states: [{
        value: null,
        text: trans('backend.general.select')
      }, {
        value: 'FL',
        text: trans('backend.states.FL')
      }, {
        value: 'AL',
        text: trans('backend.states.AL')
      }, {
        value: 'AK',
        text: trans('backend.states.AK')
      }, {
        value: 'AZ',
        text: trans('backend.states.AZ')
      }, {
        value: 'AR',
        text: trans('backend.states.AR')
      }, {
        value: 'CA',
        text: trans('backend.states.CA')
      }, {
        value: 'NC',
        text: trans('backend.states.NC')
      }, {
        value: 'SC',
        text: trans('backend.states.SC')
      }, {
        value: 'CO',
        text: trans('backend.states.CO')
      }, {
        value: 'CT',
        text: trans('backend.states.CT')
      }, {
        value: 'ND',
        text: trans('backend.states.ND')
      }, {
        value: 'SD',
        text: trans('backend.states.SD')
      }, {
        value: 'DE',
        text: trans('backend.states.DE')
      }, {
        value: 'DC',
        text: trans('backend.states.DC')
      }, {
        value: 'GA',
        text: trans('backend.states.GA')
      }, {
        value: 'HI',
        text: trans('backend.states.HI')
      }, {
        value: 'ID',
        text: trans('backend.states.ID')
      }, {
        value: 'IL',
        text: trans('backend.states.IL')
      }, {
        value: 'IN',
        text: trans('backend.states.IN')
      }, {
        value: 'IA',
        text: trans('backend.states.IA')
      }, {
        value: 'KS',
        text: trans('backend.states.KS')
      }, {
        value: 'KY',
        text: trans('backend.states.KY')
      }, {
        value: 'LA',
        text: trans('backend.states.LA')
      }, {
        value: 'ME',
        text: trans('backend.states.ME')
      }, {
        value: 'MD',
        text: trans('backend.states.MD')
      }, {
        value: 'MA',
        text: trans('backend.states.MA')
      }, {
        value: 'MI',
        text: trans('backend.states.MI')
      }, {
        value: 'MN',
        text: trans('backend.states.MN')
      }, {
        value: 'MS',
        text: trans('backend.states.MS')
      }, {
        value: 'MO',
        text: trans('backend.states.MO')
      }, {
        value: 'MT',
        text: trans('backend.states.MT')
      }, {
        value: 'NE',
        text: trans('backend.states.NE')
      }, {
        value: 'NV',
        text: trans('backend.states.NV')
      }, {
        value: 'NJ',
        text: trans('backend.states.NJ')
      }, {
        value: 'NY',
        text: trans('backend.states.NY')
      }, {
        value: 'NH',
        text: trans('backend.states.NH')
      }, {
        value: 'NM',
        text: trans('backend.states.NM')
      }, {
        value: 'OH',
        text: trans('backend.states.OH')
      }, {
        value: 'OK',
        text: trans('backend.states.OK')
      }, {
        value: 'OR',
        text: trans('backend.states.OR')
      }, {
        value: 'PA',
        text: trans('backend.states.PA')
      }, {
        value: 'RI',
        text: trans('backend.states.RI')
      }, {
        value: 'TN',
        text: trans('backend.states.TN')
      }, {
        value: 'TX',
        text: trans('backend.states.TX')
      }, {
        value: 'UT',
        text: trans('backend.states.UT')
      }, {
        value: 'VT',
        text: trans('backend.states.VT')
      }, {
        value: 'VA',
        text: trans('backend.states.VA')
      }, {
        value: 'WV',
        text: trans('backend.states.WV')
      }, {
        value: 'WA',
        text: trans('backend.states.WA')
      }, {
        value: 'WI',
        text: trans('backend.states.WI')
      }, {
        value: 'WY',
        text: trans('backend.states.WY')
      }, ],
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
      return this.validFirstName && this.validLastName && this.validEmail &&
        this.validAddress && this.validPhone && this.validMaritalStaus && this.validStreet && this.validCity &&
        this.validSex && this.validZIPCode && this.validState && this.validPhone && this.validPosition && this.validPersonType
    },
    validFirstName() {
      return this.draft.name ? this.draft.name.length > 3 : false
    },
    validLastName() {
      return this.draft.name ? this.draft.name.length > 3 : false
    },
    //validBirthday() {
    //var today = moment.now
    //var birthday = moment(this.draft.birthday)
    //return this.draft.birthday ? today.diff(birthday, 'day') > 0 : false
    //},
    validMaritalStaus() {
      return this.draft.maritalstatus != null
    },
    validEmail() {
      var re = /\S+@\S+\.\S+/
      return re.test(this.draft.email)
    },
    validAddress() {
      return this.draft.address != null
    },
    validStreet() {
      return this.draft.street != null
    },
    validCity() {
      return this.draft.city != null
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
    get_positions() {
      var result = [{
        value: null,
        text: trans('backend.person.select_position')
      }]
      for (var i = 0; i < this.positions.length; i++) {
        result.push({
          value: this.positions[i].id,
          text: this.positions[i].name
        }, )
      }
      return result
    },
    get_persontypes() {
      var result = [{
        value: null,
        text: trans('backend.person.select_persontype')
      }]
      for (var i = 0; i < this.persontypes.length; i++) {
        result.push({
          value: this.persontypes[i].id,
          text: this.persontypes[i].name
        }, )
      }
      return result
    }
  }
}
</script>
