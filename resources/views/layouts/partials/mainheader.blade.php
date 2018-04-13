<!-- Main Header -->
<header class="main-header">
    <a href="{{ route('home') }}" class="logo">
        <span class="logo-mini"><b>NHIC</b></span>
        <span class="logo-lg"><b>New</b> Hope <b>In Christ</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('message.togglenav') }}</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">40</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('message.tabmessages') }}</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                           {{-- <img src="{{ Gravatar::src($user->email) }}" class="img-circle" alt="{{ $user->first_name . ' ' . $user->last_name }}" /> --}}
                                        </div>
                                        <h4>
                                            {{ trans('message.supteam') }}
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>{{ trans('message.awesometheme') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">c</a></li>
                    </ul>
                </li>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('message.notifications') }}</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> {{ trans('message.newmembers') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">{{ trans('message.viewall') }}</a></li>
                    </ul>
                </li>

                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('message.tasks') }}</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            {{ trans('message.tasks') }}
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% {{ trans('message.complete') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">{{ trans('message.alltasks') }}</a>
                        </li>
                    </ul>
                </li>

                @guest
                    <li><a href="{{ route('login') }}">{{ trans('message.login') }}</a></li>
                @else
                    <li class="dropdown user user-menu" id="user_menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             {{-- <img src="{{ Gravatar::src($user->email) }}" class="user-image" alt="{{ $user->first_name . ' ' . $user->last_name }}"/> --}}
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                {{-- <img src="{{ Gravatar::src($user->email) }}" class="img-circle" alt="User Image" /> --}}
                                <p>
                                    {{  Auth::user()->name }}
                                    <small>{{ trans('message.login') }}</small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('message.followers') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('message.friends') }}</a>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">{{ trans('message.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" id="logout"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ trans('message.signout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endguest
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
