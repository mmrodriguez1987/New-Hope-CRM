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
        },
        {
          path: 'theme',
          redirect: '/theme/colors',
          name: 'Theme',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'colors',
              name: 'Colors',
              component: Colors
            },
            {
              path: 'typography',
              name: 'Typography',
              component: Typography
            }
          ]
        },
        {
          path: 'charts',
          name: 'Charts',
          component: Charts
        },
        {
          path: 'widgets',
          name: 'Widgets',
          component: Widgets
        },
        {
          path: 'users',
          meta: { label: 'Users'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Users,
            },
            {
              path: ':id',
              meta: { label: 'User Details'},
              name: 'User',
              component: User,
            },
          ]
        },
        {
          path: 'base',
          redirect: '/base/cards',
          name: 'Base',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'breadcrumbs',
              name: 'Breadcrumbs',
              component: Breadcrumbs
            },
            {
              path: 'cards',
              name: 'Cards',
              component: Cards
            },
            {
              path: 'carousels',
              name: 'Carousels',
              component: Carousels
            },
            {
              path: 'collapses',
              name: 'Collapses',
              component: Collapses
            },
            {
              path: 'jumbotrons',
              name: 'Jumbotrons',
              component: Jumbotrons
            },
            {
              path: 'list-groups',
              name: 'List Groups',
              component: ListGroups
            },
            {
              path: 'navs',
              name: 'Navs',
              component: Navs
            },
            {
              path: 'navbars',
              name: 'Navbars',
              component: Navbars
            },
            {
              path: 'paginations',
              name: 'Paginations',
              component: Paginations
            },
            {
              path: 'popovers',
              name: 'Popovers',
              component: Popovers
            },
            {
              path: 'progress-bars',
              name: 'Progress Bars',
              component: ProgressBars
            },
            {
              path: 'switches',
              name: 'Switches',
              component: Switches
            },
            {
              path: 'tabs',
              name: 'Tabs',
              component: Tabs
            },
            {
              path: 'tooltips',
              name: 'Tooltips',
              component: Tooltips
            }
          ]
        },
        {
          path: 'buttons',
          redirect: '/buttons/standard-buttons',
          name: 'Buttons',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'standard-buttons',
              name: 'Standard Buttons',
              component: StandardButtons
            },
            {
              path: 'button-groups',
              name: 'Button Groups',
              component: ButtonGroups
            },
            {
              path: 'dropdowns',
              name: 'Dropdowns',
              component: Dropdowns
            },
            {
              path: 'brand-buttons',
              name: 'Brand Buttons',
              component: BrandButtons
            }
          ]
        },
        {
          path: 'editors',
          redirect: '/editors/text-editors',
          name: 'Editors',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'text-editors',
              name: 'Text Editors',
              component: TextEditors
            },
            {
              path: 'code-editors',
              name: 'Code Editors',
              component: CodeEditors
            }
          ]
        },
        {
          path: 'forms',
          redirect: '/forms/basic-forms',
          name: 'Forms',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'basic-forms',
              name: 'Basic Forms',
              component: BasicForms
            },
            {
              path: 'advanced-forms',
              name: 'Advanced Forms',
              component: AdvancedForms
            },
            {
              path: 'validation-forms',
              name: 'Form Validation',
              component: ValidationForms
            }
          ]
        },
        {
          path: 'google-maps',
          name: 'Google Maps',
          component: GoogleMaps
        },
        {
          path: 'icons',
          redirect: '/icons/font-awesome',
          name: 'Icons',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'coreui-icons',
              name: 'CoreUI Icons',
              component: CoreUIIcons
            },
            {
              path: 'flags',
              name: 'Flags',
              component: Flags
            },
            {
              path: 'font-awesome',
              name: 'Font Awesome',
              component: FontAwesome
            },
            {
              path: 'simple-line-icons',
              name: 'Simple Line Icons',
              component: SimpleLineIcons
            }
          ]
        },
        {
          path: 'notifications',
          redirect: '/notifications/alerts',
          name: 'Notifications',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'alerts',
              name: 'Alerts',
              component: Alerts
            },
            {
              path: 'badges',
              name: 'Badges',
              component: Badges
            },
            {
              path: 'modals',
              name: 'Modals',
              component: Modals
            },
            {
              path: 'toastr',
              name: 'Toastr',
              component: Toastr
            }
          ]
        },
        {
          path: 'plugins',
          redirect: '/plugins/draggable',
          name: 'Plugins',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'draggable',
              name: 'Draggable Cards',
              component: Draggable
            },
            {
              path: 'calendar',
              name: 'Calendar',
              component: Calendar
            },
            {
              path: 'spinners',
              name: 'Spinners',
              component: Spinners
            },
          ]
        },
        {
          path: 'tables',
          redirect: '/tables/tables',
          name: 'Tables',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'tables',
              name: 'Simple Tables',
              component: Tables
            },
            {
              path: 'data-table',
              name: 'Data Table',
              component: DataTable
            },
          ]
        },
        {
          path: 'apps',
          name: 'Apps',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'invoicing',
              redirect: '/apps/invoicing/invoice',
              name: 'Invoicing',
              component: {
                render (c) { return c('router-view') }
              },
              children: [
                {
                  path: 'invoice',
                  name: 'Invoice',
                  component: Invoice
                }
              ]
            },
            {
              path: 'email',
              redirect: '/apps/email/inbox',
              name: 'Email',
              component: {
                render (c) { return c('router-view') }
              },
              children: [
                {
                  path: 'compose',
                  name: 'Compose',
                  component: Compose
                },
                {
                  path: 'inbox',
                  name: 'Inbox',
                  component: Inbox
                },
                {
                  path: 'message',
                  name: 'Message',
                  component: Message
                }
              ]
            }
          ]
        }
      ]
    },
    {
      path: '/pages',
      redirect: '/pages/404',
      name: 'Pages',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: '404',
          name: 'Page404',
          component: Page404
        },
        {
          path: '500',
          name: 'Page500',
          component: Page500
        },
        {
          path: 'login',
          name: 'Login',
          component: Login
        },
        {
          path: 'register',
          name: 'Register',
          component: Register
        }
      ]
    }
  ]
})

export default router
