import Vue from 'vue'
import Router from 'vue-router'

import Home from '../components/Home.vue'
import DefaultContainer from '../container/DefaultContainer.vue'
import Dashboard from '../components/Dashboard.vue'
import Person from '../components/person/Index.vue'
import Position from '../components/position/Index.vue'
import PersonType from '../components/person_type/Index.vue'
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'



Vue.use(Router)

let router = new Router({
  mode: 'history',
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      meta: { auth: undefined }
    },
    {
      path: '/admin',
      redirect: '/admin',
      name: 'HomeAdmin',
      component: DefaultContainer,
      meta: {
        auth: true
      },
      children: [
        { 
          path: 'dashboard',
          name: 'Dashboard', 
          component: Dashboard 
        },{ 
          path: 'persons', 
          name: 'persons', 
          component: Person  
        },{
          path: 'positions',
          name: 'positions',
          component: Position
        }, {
          path: 'persontypes',
          name: 'persontypes',
          component: PersonType
        }
      ]
    },
    {
      path: '/login',
      redirect: '/login',
      name: 'login',
      component: Login,
      meta: {
          auth: false
      }
    },
    {
      path: '/register',
      redirect: '/register',
      name: 'register',
      component: Register,
      meta: {
        auth: false
      }
    } 
  ]
})

export default router
