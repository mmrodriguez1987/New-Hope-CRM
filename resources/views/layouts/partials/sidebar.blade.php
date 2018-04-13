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
                    <li class="active"><a href="{{ route('home') }}"><i class="fa fa-diamond"></i>General</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-pie-chart"></i>Google Analitycs</a></li>

                </ul>
            </li>

            <!-- Company -->
            <li class="treeview">
                <a href="{{ url('/') }}">
                    <i class='fa fa-institution'></i>
                        <span>Home Page</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                      {{--<li><a href="{{ route('slides.index') }}"><i class="fa fa-lightbulb-o"></i>Slideshow</a></li>
                   <li><a href="{{ url('/') }}"><i class="fa fa-lightbulb-o"></i>Information</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-shield"></i>Services</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-rocket"></i>Products</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-users"></i>Team</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-paper-plane"></i>Projects</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-paw"></i>Testimonial</a></li> --}}
                </ul>
            </li>

            <!-- Blog -->
            <li class="treeview">
                <a href="{{ route('home')  }}">
                    <i class="fa fa-file-text"></i>
                        <span>Blog</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-file-word-o"></i>Articles
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-image"></i>Media</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-bookmark"></i>Category</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-tag"></i>Tag</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-cog"></i>Configuration</a></li>
                </ul>
            </li>

            <!-- Users -->
            <li class="treeview">
                <a href="{{ route('home')  }}">
                    <i class="fa fa-users"></i>
                    <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-user"></i>
                            Users
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-users"></i>User Group</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-comment"></i>User Messages</a></li>
                </ul>
            </li>

            <!-- Mail -->
            <li class="treeview  disabled">
                <a href="{{ route('home')  }}">
                    <i class="fa fa-envelope"></i>
                    <span>E-mail</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-envelope-o"></i>Inbox
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li>
                    <li><a href="{{ route('home')  }}"> <i class="fa fa-plus-circle"></i>Compose</a></li>

                </ul>
            </li>

            <!-- Newsletter -->
            <li class="treeview  disabled">
                <a href="{{ route('home')  }}">
                    <i class='fa fa-paper-plane'></i>
                        <span>Newsletter</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('home')  }}"><i class="fa fa-book"></i>Lists</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-user-circle"></i>Suscribers</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-bookmark"></i>Categories</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-file"></i>Templates</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-cog"></i>Configuration</a></li>
                </ul>
            </li>

            <li class="treeview disabled">
                <a href="{{ route('home')  }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>NissiShop</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Catalog -->
                    <li class="treeview">
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-folder"></i> Catalog
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('home')  }}"><i class="fa fa-flag"></i> Categories</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-shield"></i> Products</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-cube"></i> Attributes</a> </li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-cubes"></i> Attributes Group</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-check-square"></i> Options</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-diamond"></i> Manufacturers</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-commenting"></i> Reviews</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-edit"></i> Labels</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-cloud"></i> Downloads</a></li>
                        </ul>
                    </li>
                    <!-- Sales -->
                    <li class="treeview">
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-money"></i> Sales
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('home')  }}"><i class="fa fa-flag"></i> Orders</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-user"></i> Customer</a> </li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-users"></i> Customer Groups</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-vcard"></i> Coupons</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-google-wallet"></i> Vouchers</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-quoura"></i> Quotes</a></li>
                        </ul>
                    </li>
                    <!-- Logistic -->
                    <li class="treeview">
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-skyatlas"></i> Logistics
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('home')  }}"><i class="fa fa-credit-card-alt"></i> Payment</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-plane"></i> Shipping</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-paint-brush"></i> Theme</a></li>
                        </ul>
                    </li>

                     <!-- Reports -->
                    <li class="treeview ">
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-file-text"></i> Reports
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('home')  }}"><i class="fa fa-plane"></i> Orders</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-plane"></i> Most Viewed Products</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-plane"></i> Purchased Products</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-plane"></i> Sales</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-plane"></i> Product Catalog</a></li>
                        </ul>
                    </li>

                    <!-- System -->
                    <li class="treeview">
                        <a href="{{ route('home')  }}">
                            <i class="fa fa-cog"></i> System
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('home')  }}"><i class="fa fa-asterisk"></i> Configuration</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-flag"></i> Contries</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-bell"></i> Stock Status</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-gavel"></i> Order Status</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-crosshairs"></i> Lengths</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-crosshairs"></i> Weigths</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-map-marker"></i> Zone</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-globe"></i> Geo Zones</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-thumb-tack"></i> Tax Classes</a> </li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-circle"></i> Tax Rates</a></li>
                            <li><a href="{{ route('home')  }}"><i class="fa fa-envelope-open"></i> Message</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- Configuration -->
            <li class="treeview  disabled">
                <a href="{{ route('home')  }}">
                    <i class='fa fa-cog'></i>
                        <span>Configuration</span>
                        <i class="fa fa-angle-left pull-right">
                    </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('home')  }}"><i class="fa fa-book"></i>General</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-user-circle"></i>Blog</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-bookmark"></i>Newsletter</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-file"></i>Ecommerce</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-file"></i>Templates</a></li>
                    <li><a href="{{ route('home')  }}"><i class="fa fa-cog"></i>Configuration</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
