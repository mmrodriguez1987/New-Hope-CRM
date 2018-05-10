<template>
<div>
  <b-modal v-model="show" :title="draft.id ? trans('backend.person.edit') : trans('backend.person.add')" @hide="close">
    <b-container fluid>

      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validName ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_firstname')}}</label></b-col>
        <b-col><input type="text" v-model="draft.firstname" class="form-control"></b-col>
      </b-row>

      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validName ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_lastname')}}</label></b-col>
        <b-col><input type="text" v-model="draft.lastname" class="form-control"></b-col>
      </b-row>


      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validEmail ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_email')}}</label></b-col>
        <b-col><input type="text" v-model="draft.email" class="form-control"></b-col>
      </b-row>

      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col><label :class="validMaritalStaus ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_maritalstatus')}}</label></b-col>
        <b-col>
          <b-form-select v-model="draft.maritalstatus" :options="options" class="mb-3" /></b-col>
      </b-row>

      <b-row class="mb-1">
        <b-col cols="2"> </b-col>
        <b-col>
          <label :class="validBirthday ? 'label-valid' : 'label-required'">{{trans('backend.person.lbl_birthday')}}</label>
        </b-col>
        <b-col>
          <datepicker v-model="birthday" language="en" input-class="form-control" />
        </b-col>

      </b-row>


      <label :class="!editing ? '' : start ? 'label-valid' : 'label-required'">Fecha de inicio</label>
      <p v-if="!editing">{{experience.start | dateFormat}}</p>
      <datepicker v-else v-model="start" language="en" input-class="form-control"></datepicker>


    </b-container>
    <div slot="modal-footer">
      <b-btn variant="success" @click="save" :disabled="!validForm"> {{trans('own.buttons.save')}}</b-btn>
      <b-btn variant="danger" @click="close"> {{trans('own.buttons.close')}}</b-btn>
    </div>
  </b-modal>
</div>
</template>

<script>
export default {
  props: ['show', 'draft'],
  data() {
    return {
      options: [{
          value: null,
          text: trans('own.role.select')
        },
        {
          value: 'admin',
          text: trans('own.role.admin')
        },
        {
          value: 'student',
          text: trans('own.role.student')
        },
        {
          value: 'suscriptor',
          text: trans('own.role.suscriptor')
        },
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
      this.$store.dispatch('updateUser', {
        id: id,
        draft
      })
    },
    store() {
      this.$store.dispatch('storeUser', this.draft)
    },
  },
  computed: {
    validForm() {
      return this.validName && this.validEmail && this.validPassword && this.validRole &&
        this.validAddress && this.validPhone && this.validProfession
    },
    validName() {
      return this.draft.name ? this.draft.name.length > 3 : false
    },
    validPassword() {
      return this.draft.password ? this.draft.password.length > 5 : this.draft.id
    },
    validEmail() {
      var re = /\S+@\S+\.\S+/;
      return re.test(this.draft.email);
    },
    validRole() {
      return this.draft.role != null
    },
    validAddress() {
      return this.draft.address != null
    },
    validPhone() {
      return this.draft.phone != null
    },
    validProfession() {
      return this.draft.profession != null
    },
  }
}
</script>
