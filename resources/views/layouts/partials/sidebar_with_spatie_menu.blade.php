<aside class="main-sidebar">
    <section class="sidebar">
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                    {{-- <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" /> --}}
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
            </div>
        </div>
        @endif
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        {{ Menu::sidebar() }}
    </section>
</aside>
