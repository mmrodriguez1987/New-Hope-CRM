<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <b-row class="justify-content-center">
        <b-col md="8">
          <b-card-group>
            <b-card no-body class="p-4">
              <b-card-body>
                <b-form @submit.prevent="sendToken()" method="POST">
                  <h1>Login</h1>
                  <p class="text-muted">Sign In to your account</p>
                  <b-input-group class="mb-3">
                    <b-input-group-prepend><b-input-group-text><i class="icon-user"></i></b-input-group-text></b-input-group-prepend>
                    <b-form-input type="text" class="form-control" placeholder="Username"  autocomplete="username email" v-model="username"  />
                  </b-input-group>
                  <b-input-group class="mb-4">
                    <b-input-group-prepend><b-input-group-text><i class="icon-lock"></i></b-input-group-text></b-input-group-prepend>
                    <b-form-input type="password" class="form-control" placeholder="Password" autocomplete="current-password"  v-model="password" />
                  </b-input-group>
                  <b-row>
                    <b-col cols="6">
                      <b-button variant="primary" class="px-4" type="submit" >Login</b-button>
                    </b-col>
                    <b-col cols="6" class="text-right">
                      <b-button variant="link" class="px-0" href="#" >Forgot password?</b-button>
                    </b-col>
                  </b-row>
                  <vue-recaptcha  ref="invisibleRecaptcha"  @verify="onVerify"  @expired="onExpired" size="invisible" :badge="badge" :sitekey="sitekey"></vue-recaptcha>
                </b-form>
              </b-card-body>
            </b-card>
            <b-card no-body class="text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <b-card-body class="text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>For registre.</p>
                  <b-button variant="primary" class="active mt-3" href="/register">Register Now!</b-button>
                </div>
              </b-card-body>
            </b-card>
          </b-card-group>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

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
               auth.login(data.token, data.user);
               this.$router.push('/dashboard');
            })
            .catch(({response}) => {                    
              alert(response.data.message);
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