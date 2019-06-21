<template>
  <AppHeaderDropdown right no-caret>
    <template slot="header">
      <img
        src="images/avatars/6.jpg"
        class="img-avatar"
        alt="admin@bootstrapmaster.com" />
    </template>\
    <template slot="dropdown">
      <b-dropdown-header tag="div"  v-if="authenticated && user" class="text-center">
        <strong>Account: {{ user.name }}</strong>      
      </b-dropdown-header>     
      <b-dropdown-item><i class="fa fa-envelope-o" /> Messages
        <b-badge variant="success">{{ itemsCount }}</b-badge>
      </b-dropdown-item>
      <b-dropdown-header tag="div" class="text-center">
        <strong>Settings</strong>
      </b-dropdown-header>
      <b-dropdown-item><i class="fa fa-user" /> Profile</b-dropdown-item>
      <b-dropdown-item><i class="fa fa-wrench" /> Settings</b-dropdown-item>   
     
      <b-dropdown-divider />
      <div v-if="authenticated && user">
        <b-dropdown-item to="/logout">
          <i class="fa fa-lock" />Logout        
        </b-dropdown-item>
      </div>
    </template>
  </AppHeaderDropdown>
</template>

<script>
import { HeaderDropdown as AppHeaderDropdown } from '@coreui/vue'
export default {
  name: 'DefaultHeaderDropdownAccnt',
  components: {
    AppHeaderDropdown
  },
  data: () => {
    return { 
      itemsCount: 42,
      authenticated: auth.check(),
      user: auth.user  
    }
  },
  mounted() {
    Event.$on('userLoggedIn', () => {
      this.authenticated = true;
      this.user = auth.user;
    });
  },
}
</script>
