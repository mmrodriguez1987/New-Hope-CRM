<template>
  <CContainer class="d-flex content-center min-vh-100">
    <CRow>
      <CCol>
        <CCardGroup>
          <CCard class="p-4">
            <CCardBody>
              <CForm @submit.prevent="sendToken" method="POST">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <CInput placeholder="Username" autocomplete="username email" v-model="username" >
                  <template #prepend-content><CIcon name="cil-user"/></template>
                </CInput>
                <CInput placeholder="Password" type="password" autocomplete="curent-password"  v-model="password">
                  <template #prepend-content><CIcon name="cil-lock-locked"/></template>
                </CInput>
                <CRow>
                  <CCol col="6" class="text-left">
                    <CButton  type="submit" color="primary" class="px-4">Login</CButton>
                  </CCol>
                  <CCol col="6" class="text-right">
                    <CButton color="link" class="px-0">Forgot password?</CButton>
                    <CButton color="link" class="d-md-none">Register now!</CButton>
                  </CCol>
                </CRow>
                <vue-recaptcha  ref="invisibleRecaptcha"  @verify="onVerify"  @expired="onExpired" size="invisible" :badge="badge" :sitekey="sitekey" :loadRecaptchaScript="true"></vue-recaptcha>
              </CForm>
            </CCardBody>
          </CCard>         
        </CCardGroup>
      </CCol>
    </CRow>
  </CContainer>
</template>

<style>
body {
  background-image: "URL('/images/newhope-back.jpg')" !important;
}
</style>

<script>
  import VueRecaptcha from 'vue-recaptcha'

  export default {
    components: { VueRecaptcha },
    data() {
      return {
        username: '',
        password: '',
        sitekey: process.env.MIX_INVISIBLE_RECAPTCHA_SITEKEY,
        badge: process.env.MIX_INVISIBLE_RECAPTCHA_BADGE,       
      }
    },

    methods: {
      onVerify: function (response) {
				let data = {
          username: this.username,
          password: this.password
        };

        axios.post('/api/login', data)
             .then(({data}) => {
              auth.login(data.token, data.user)
              this.$router.push('/api/dashboard')
            })
            .catch(({response}) => {                    
              alert(response.data.message)
            });
    	}, 

      sendToken: function () {
        this.$refs.invisibleRecaptcha.execute()
      },
      
      onExpired: function () {
		    console.log('Expired')
		  },
		  resetRecaptcha () {
        this.$refs.invisibleRecaptcha.reset()
			},      
    }   
  }
</script>
