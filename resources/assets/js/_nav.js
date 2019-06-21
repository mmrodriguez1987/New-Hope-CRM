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
      name: 'Settings',
      url: '/persons',
      icon: 'icon-puzzle',
      children: [
        {
          name: 'persons',
          url: '/persons',
          icon: 'icon-puzzle'
        },
        {
          name: 'services',
          url: '/services',
          icon: 'icon-puzzle'
        }        
      ]
    }
    
  ]
}
