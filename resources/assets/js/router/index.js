import Vue from 'vue'
import Router from 'vue-router'
import DefaultContainer from '../container/DefaultContainer.vue'
import Dashboard from '../components/Dashboard.vue'
//import AdminPages from '../components/admin_pages.vue'
//import Person from '../components/person/Index.vue'
//import Position from '../components/position/Index.vue'
//import PersonType from '../components/person_type/Index.vue'


Vue.use(Router)

let router = new Router({
  mode: 'history',
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: DefaultContainer,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        }
      ]
    }
  ]
})

export default router
