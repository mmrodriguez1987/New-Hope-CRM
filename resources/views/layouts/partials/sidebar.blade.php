<aside class="main-sidebar">
  <section class="sidebar-menu" data-widget="tree">
    @if( Auth::check())
    <div class="user-panel">
      <div class="pull-left image">
        <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y" class="img-circle" alt="{{ $user->first_name . ' ' . $user->last_name }}" />
      </div>
      <div class="pull-right info">
        <p>{{ $user->first_name . ' ' . $user->last_name }}</p>
        <!-- Status -->
        <a href="{{ route('home')  }}"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      </div>
    </div>
    @endif
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input name="q" class="form-control" placeholder="Search..." type="text">
        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
      </div>
    </form>
    <ul class="sidebar-menu">

      <li class="header">MAIN NAVIGATION</li>

      <li class="active treeview menu-open">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu menu-open">
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
            <i class="fa fa-th"></i> <span>Catalogos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <router-link tag="li" to="/person">
            <a><i class="fa fa-circle-o"><span></i> {{trans('bck.person.title')}}</span></i></a>
          </router-link>
        </ul>
      </li>
    </ul>



  </section>
</aside>
