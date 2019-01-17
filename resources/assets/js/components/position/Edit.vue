<template>
<div>
  <b-modal v-model="show" :title="draft.id ? trans('app.blog_category.edit') : trans('app.blog_category.add')"  @hide="close">
        <b-container fluid>

              <b-row class="mb-1">
               <b-col><label :class="validName ? 'label-valid' : 'label-required'">{{trans('app.blog_category.name')}}</label></b-col>
             </b-row>
             <b-row class="mb-1">
               <b-col><input type="text" v-model="draft.name" class="form-control" ></b-col>
             </b-row>

             <b-row class="mb-1">
               <b-col><label :class="validImageUrl ? 'label-valid' : 'label-required'">{{trans('app.blog_category.imageurl')}}</label></b-col>
             </b-row>
             <b-row class="mb-1">
               <b-col><input type="text" v-model="draft.imageurl" class="form-control" ></b-col>
             </b-row>
             <b-row class="mb-1">
               <b-col><label :class="validMetaDesc ? 'label-valid' : 'label-required'">{{trans('app.blog_category.metadesc')}}</label></b-col>
             </b-row>
             <b-row class="mb-1">
               <b-col><input type="text" v-model="draft.metadesc" class="form-control" ></b-col>
             </b-row>

              <b-row class="mb-1">
               <b-col><label :class="validMetaKeyWords ? 'label-valid' : 'label-required'">{{trans('app.blog_category.metakeywords')}}</label></b-col>
             </b-row>
             <b-row class="mb-1">
               <b-col><input type="text" v-model="draft.metakeywords" class="form-control" ></b-col>
             </b-row>

            <b-row class="mb-1">
               <b-col><label :class="validDescription ? 'label-valid' : 'label-required'">{{trans('app.billingTerm.description')}}</label></b-col>
             </b-row>
             <b-row class="mb-1">
               <b-col><textarea rows="4" v-model="draft.description" class="form-control"></textarea>
               </b-col>
             </b-row>

        </b-container>
    <div slot="modal-footer" class="pull-right">
        <b-btn class="btn btn-outline-danger" @click="close"> {{trans('app.buttons.close')}}</b-btn>

        <b-btn class="btn btn-outline-primary" @click="save" :disabled="!validForm"> {{draft.id ? trans('app.buttons.update') : trans('app.buttons.create')}}</b-btn>

    </div>
    <!-- </b-form>     -->
  </b-modal>
</div>
</template>

<script>
    export default {
        props: ['show', 'draft'],
        data(){
            return{

            }
        },
        created(){
        },
        methods:{
            listCategories(){
                this.$store.dispatch('listCategories')
            },
            close(){
                this.$emit('close')
                this.images = []

            },
            save(){
                if (this.draft.id) {
                    this.update()
                } else{
                    this.store()
                }
                this.close()
            },
            update(){

                this.$store.dispatch('updateBlogCategory', {id:this.draft.id, draft:this.draft, Base64Img:this.base64, images:this.images})
            },
            store(){
                this.$store.dispatch('storeBlogCategory',
                {draft:this.draft, Base64Img:this.base64, images:this.images,})

            },
        },
        computed:{
            validForm(){
              return  this.validImageUrl && this.validName && this.validMetaDesc  && this.validMetaKeyWords && this.validDescription
            },
            validName(){
              return this.draft.name ? this.draft.name.length > 3 : false
            },
            validImageUrl(){
              return this.draft.imageurl
            },
            validMetaDesc(){
                return this.draft.metadesc
            },
            validMetaKeyWords(){
                return this.draft.metakeywords
            },
            validDescription(){
                return this.draft.description
            },

        }
    }
</script>
