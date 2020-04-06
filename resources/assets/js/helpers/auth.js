class Auth {
  constructor() {
    this.token = window.localStorage.getItem('token');        

    if (window.localStorage.getItem('user')) {
      this.user = JSON.parse(window.localStorage.getItem('user'));
    } else {
      this.user = null;
    }
  
    if (this.token) {
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
      this.getUser();
    }
  }

  login(token, user) {
    window.localStorage.setItem('token', token);
    window.localStorage.setItem('user', JSON.stringify(user));

    axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

    this.token = token;
    this.user = user;

    Event.$emit('userLoggedIn');
  }

  check() {
    return !!this.token;
  }

  getUser() {
    axios.call('get', '/api/get-user')
      .then(({
        data
      }) => {
        this.user = data;
      });

  }

}

export default Auth;