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

  loadCart(data) {
    //I check if there is a cart entry in localStorage
    if (localStorage.getItem('cart')) {
            // if there is - expand and write to the variable cart
      cart = JSON.parse(localStorage.getItem('cart'));
      if(isEmpty(cart)){
          $('.main-cart').html('Cart is empty');
      }
      else 
        init();
    }
    else {
      $('.main-cart').html('Cart is empty');
    }
  }


}

export default Auth;