<template>
  <div>
    <b-modal v-model="show" :title="draft.id ? trans('bck.position.edit') : trans('bck.position.add')"  @hide="close">
      <b-container fluid>
        <b-row class="mb-1">
          <b-col>
            <label :class="validName ? 'label-valid' : 'label-required'">{{trans('bck.position.name')}}</label>
          </b-col>
        </b-row>
        <b-row class="mb-1">
          <b-col>
            <input type="text" v-model="draft.name" class="form-control" >
          </b-col>
        </b-row>
        <b-row class="mb-1">
          <b-col>
            <label :class="'label-valid'">{{trans('bck.position.status')}}</label>
          </b-col>
        </b-row>
        <b-row class="mb-1">
          <b-col>
            <b-form-checkbox id="checkbox1" v-model="active" value="true" unchecked-value="false">
              {{trans('bck.position.status')}}
            </b-form-checkbox>
          </b-col>
        </b-row>
      </b-container>
      <div slot="modal-footer" class="pull-right">
        <b-btn class="btn btn-outline-danger" @click="close"> {{trans('bck.general.close')}}</b-btn>
        <b-btn class="btn btn-outline-primary" @click="save" :disabled="!validForm"> {{draft.id ? trans('bck.general.update') : trans('bck.general.create')}}</b-btn>
      </div>
  </b-modal>
</div>
</template>

<script>
// export default {
//   props: ['show', 'draft'],
//   data(){
//     return{ }
//   },
//   created(){

//   },
//   methods:{
//     listPositions(){
//       this.$store.dispatch('listPositions')
//     },
//     close(){
//       this.$emit('close')
//       this.images = []
//     },
//     save(){
//       if (this.draft.id) {
//         this.update()
//       } else{
//         this.store()
//       }
//       this.close()
//     },
//     update(){
//       this.$store.dispatch('updatePosition', { id:this.draft.id, draft:this.draft })
//     },
//     store(){
//       this.$store.dispatch('storePosition', {draft:this.draft})
//     },
//   },
//   computed:{
//     validForm(){
//       return this.validName
//     },
//     validName(){
//       return this.draft.name ? this.draft.name.length > 3 : false
//     },
//   }
// }
</script>
