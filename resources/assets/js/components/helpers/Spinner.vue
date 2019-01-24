<template>
  <atom-spinner
      :animation-duration="1000"
      :size="size"
      :color="'#dd4b39'"
      class="spinner"
  />
</template>
<script>
    import {AtomSpinner} from 'epic-spinners'
    export default {
        props: ['size'],
        components: {
            AtomSpinner
        },
    }
</script>
