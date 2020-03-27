export default [{
  _name: 'CSidebarNav',
  _children: [
    {
      _name: 'CSidebarNavItem',
      name: 'Dashboard',
      to: '/dashboard',
      icon: 'cil-speedometer',
      badge: {
        color: 'primary',
        text: 'NEW'
      }
    },
    {
      _name: 'CSidebarNavTitle',
      _children: ['Entities']
    },
    {
      _name: 'CSidebarNavItem',
      name: 'Persons',
      to: '/persons',
      icon: 'cil-user'
    },
    {
      _name: 'CSidebarNavItem',
      name: 'Families',
      to: '/families',
      icon: 'cil-people'
    },
    {
      _name: 'CSidebarNavItem',
      name: 'User Type',
      to: '/usertypes',
      icon: 'cil-we'
    },
    {
      _name: 'CSidebarNavItem',
      name: 'Positions',
      to: '/positions',
      icon: 'cil-pencil'
    },
    {
      _name: 'CSidebarNavItem',
      name: 'Professions',
      to: '/professions',
      icon: 'cil-badge'
    }
  ]
}]