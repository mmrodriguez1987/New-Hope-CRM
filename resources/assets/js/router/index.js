import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from '../components/dashboard.vue'
import AdminPages from '../components/admin_pages.vue'
import Person from '../components/person/Index.vue'
import Position from '../components/position/Index.vue'
import PersonType from '../components/person_type/Index.vue'

Vue.use(Router)

let router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/admin',
      component: AdminPages,
      children: [
        {
          path: '',
          component: Dashboard
        },{
          path: 'persons',
          component: Person
        },{
          path: 'PersonTypes',
          component: PersonType
        },{
          path: 'Position',
          component: Position
        }
      ]
    },
    {
			path: '*',
			component: {
				template : '<h1>Error 404</h1>'
			}
		},
    {
      path: '/:key',
      component: Person,
    },
  ]
})

export default router
