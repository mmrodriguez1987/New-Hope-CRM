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
        <ul class="sidebar-menu" data-widget="tree">
          <router-link tag="li" to="/person"><a><i class="fa fa-link"><span></i>{{trans('bck.person.title')}}</span></i></a></router-link>

        </ul>
    </section>
</aside>
