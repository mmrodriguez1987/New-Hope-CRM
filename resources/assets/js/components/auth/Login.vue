<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <b-row class="justify-content-center">
        <b-col md="8">
          <b-card-group>
            <b-card no-body class="p-4">
              <b-card-body>
                <b-form @submit.prevent="login()">
                  <h1>Login</h1>
                  <p class="text-muted">Sign In to your account</p>
                  <b-input-group class="mb-3">
                    <b-input-group-prepend><b-input-group-text><i class="icon-user"></i></b-input-group-text></b-input-group-prepend>
                    <b-form-input type="text" class="form-control" placeholder="Username" autocomplete="username email" v-model="loginUser.email"  />
                  </b-input-group>
                  <b-input-group class="mb-4">
                    <b-input-group-prepend><b-input-group-text><i class="icon-lock"></i></b-input-group-text></b-input-group-prepend>
                    <b-form-input type="password" class="form-control" placeholder="Password" autocomplete="current-password"  v-model="loginUser.password" />
                  </b-input-group>
                  <b-row>
                    <b-col cols="6">
                      <b-button variant="primary" class="px-4" :disabled="validForm" type="submit">Login</b-button>
                    </b-col>
                    <b-col cols="6" class="text-right">
                      <b-button variant="link" class="px-0" href="/password/reset" >Forgot password?</b-button>
                    </b-col>
                  </b-row>
                </b-form>
              </b-card-body>
            </b-card>
            <b-card no-body class="text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <b-card-body class="text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>For registre.</p>
                  <b-button variant="primary" class="active mt-3" href="/register/">Register Now!</b-button>
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
import {AtomSpinner} from 'epic-spinners'
export default {
  components: {
    AtomSpinner,
  },
  data() {
    return{
				loginUser:{
					email:'',
					password:''
				},
				route: this.$router.history.current.path
			}
  },
  computed:{
			validForm(){
				return !this.loginUser.email ||  !this.loginUser.password
			},
			loading(){
				return this.$store.state.Auth.loading
			},
		},
		methods:{
			login(){
				this.$store.dispatch('login', this.loginUser)
				.then(response => {
					this.$router.push(this.route)
					location.reload()
				})
			}
		}
  }
</script>
