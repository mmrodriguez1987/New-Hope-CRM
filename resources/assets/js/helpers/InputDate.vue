<template>

      <date-picker
        v-model="date"
        :option="option"
        @change="change"
        ></date-picker>

</template>
<script>
import myDatepicker from 'vue-datepicker2'

export default {
    props: ['value'],
    methods: {
        change(){
            this.$emit('input', this.date)
        }
    },
    data () {
        return {
          date: '',
          option: {
            type: 'day',
            week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
            month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            format: 'YYYY-MM-DD',
            placeholder: 'Birthday',
            inputClass: 'form-control input-lg',
            color: {
              header: '#ccc',
              headerText: '#f00'
            },
            buttons: {
              ok: 'Ok',
              cancel: 'Cancel'
            },
            overlayOpacity: 0.5, // 0.5 as default
            dismissible: true // as true as default
          },
          timeoption: {
            type: 'min',
            week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
            month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            format: 'YYYY-MM-DD HH:mm'
          },
          multiOption: {
            type: 'multi-day',
            week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
            month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            format:"YYYY-MM-DD HH:mm"
          },
          dateBodyClass: 'date-body'
        }
    },
    components: {
        'date-picker': myDatepicker
    }
}
</script>