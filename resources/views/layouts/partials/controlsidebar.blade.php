<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active">
            <a href="#control-sidebar-home-tab" data-toggle="tab">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li>
            <a href="#control-sidebar-settings-tab" data-toggle="tab">
                <i class="fa fa-gears"></i>
            </a>
        </li>
        <li>
            <a href="#control-sidebar-stats-tab" data-toggle="tab">
                <i class="fa fa-gears"></i>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Company information</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">{{ trans('message.birthday') }}</h4>
                            <p>{{ trans('message.birthdaydate') }}</p>
                        </div>
                    </a>
                </li>
            </ul>
            <h3 class="control-sidebar-heading">{{ trans('message.progress') }}</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            {{ trans('message.customtemplate') }}
                            <span class="label label-danger pull-right">70%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab">
          <h3 class="control-sidebar-heading">Company information</h3>
          
        </div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">{{ trans('message.generalset') }}</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        {{ trans('message.reportpanel') }}
                        <input type="checkbox" class="pull-right" {{ trans('message.checked') }} />
                    </label>
                    <p>
                        {{ trans('message.informationsettings') }}
                    </p>
                </div>
            </form>
        </div>
    </div>
</aside>
<div class='control-sidebar-bg'></div>
