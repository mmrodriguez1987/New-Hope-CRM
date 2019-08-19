export default {
  items: [
    {
      name: 'Dashboard',
      url: '/dashboard',
      icon: 'icon-speedometer',
      badge: {
        variant: 'primary',
        text: 'NEW'
      }
    },    
    {
      title: true,
      name: 'CRM',
      class: '',
      wrapper: {
        element: '',
        attributes: {}
      }
    },
    {
      name: 'People',
      url: '/persons',
      icon: 'icon-emotsmile',
      children: [
        {
          name: 'families',
          url: '/families',
          icon: 'icon-people'
        },
        {
          name: 'persons',
          url: '/persons',
          icon: 'icon-user'
        }
      ]
    }, 
    {
      name: 'Settings',
      url: '/settings',
      icon: 'icon-wrench',
      children: [
        {
          name: 'Positions',
          url: '/positions',
          icon: 'icon-graduation'
        },
        {
          name: 'Sex',
          url: '/sex',
          icon: 'icon-graduation'
        },
        {
          name: 'Person Types',
          url: '/persontypes',
          icon: 'icon-badge'
        },
      ]
    }
    
  ]
}
