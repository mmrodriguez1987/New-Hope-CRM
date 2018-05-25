import Vue from 'vue'
import Router from 'vue-router'
import Person from '../components/person/Index.vue'

Vue.use(Router)

let router = new Router({
  routes: [{
      path: '/',
      component: Person
    },
    {
      path: '/Person',
      component: Person
    },
  ]
})

export default router;