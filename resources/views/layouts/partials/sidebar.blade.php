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
        {{-- <form action="{{ url('/') }}" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu"> --}}
            <!-- Dashboard -->
            <li class="active treeview menu-open">
                <a href="{{ route('home')  }}">
                    <i class='fa fa-dashboard'></i>
                        <span>Dashboard</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu menu-open">
                    <li class="active">
                      <a href="{{ route('home') }}"><i class="fa fa-diamond"></i>CRM</a>
                    </li>
                    <li>
                      <a href="{{ route('home') }}"><i class="fa fa-pie-chart"></i>Google Analytics</a>
                    </li>
                </ul>
            </li>

            <!-- Company -->
            <li class="treeview">
                <a href="{{ url('/') }}">
                    <i class='fa fa-institution'></i>
                        <span>CRM</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('personas.index') }}"><i class="fa fa-paw"></i>Membresia Iglesia</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>Security</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>Reports</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>Casas de Oracion</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>CEAP</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>New Hope Kids</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>Corrida de Servicios</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-paw"></i>Corrida de UJIERES</a></li>
                </ul>
            </li>

            <!-- Blog
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                        <span>Recursos</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    {{-- <li>
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-file-word-o"></i>Articles
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li> --}}
                    <li><a href="#"><i class="fa fa-image"></i>Eventos</a></li>
                    <li><a href="#"><i class="fa fa-image"></i>Tipos de Pago</a></li>
                    <li><a href="#"><i class="fa fa-image"></i>Tipo de Persona</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            Users
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li>
                    <li><a href="#"><i class="fa fa-users"></i>User Group</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i>User Messages</a></li>
                </ul>
            </li>


            <li class="treeview  disabled">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>E-mail</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-envelope-o"></i>Inbox
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li>
                    <li><a href="#"> <i class="fa fa-plus-circle"></i>Compose</a></li>

                </ul>
            </li>


            <li class="treeview  disabled">
                <a href="#">
                    <i class='fa fa-paper-plane'></i>
                        <span>Newsletter</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-book"></i>Lists</a></li>
                    <li><a href="#"><i class="fa fa-user-circle"></i>Suscribers</a></li>
                    <li><a href="#"><i class="fa fa-bookmark"></i>Categories</a></li>
                    <li><a href="#"><i class="fa fa-file"></i>Templates</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i>Configuration</a></li>
                </ul>
            </li>

            <li class="treeview disabled">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>NissiShop</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> Catalog
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#}"><i class="fa fa-flag"></i> Categories</a></li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i> Sales
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-flag"></i> Orders</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Customer</a> </li>

                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cog"></i> System
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-asterisk"></i> Configuration</a></li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview  disabled">
                <a href="#">
                    <i class='fa fa-cog'></i>
                        <span>Configuration</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-book"></i>General</a></li>
                    <li><a href="#"><i class="fa fa-user-circle"></i>Blog</a></li>
                </ul>
            </li>-->
        </ul>
    </section>
</aside>
