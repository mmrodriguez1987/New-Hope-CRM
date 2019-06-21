import Vue from 'vue'
import Router from 'vue-router'

//import Home from '../components/Home.vue'
import DefaultContainer from '../container/DefaultContainer.vue'
import Dashboard from '../components/Dashboard.vue'
import Person from '../components/person/Index.vue'
import Position from '../components/position/Index.vue'
import PersonType from '../components/person_type/Index.vue'
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'


Vue.use(Router)
window.Router = Router

let router = new Router({
  mode: 'history',
  history: true,
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',      
      name: 'HomeAdmin',
      component: DefaultContainer,
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
    }
  ]
})



export default router
