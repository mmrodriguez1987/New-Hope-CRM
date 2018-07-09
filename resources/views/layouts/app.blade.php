<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    @section('htmlheader')
        @include('layouts.partials.htmlheader')
    @show
    {{--  SKINS: skin-blue, skin-black, skin-purple, skin-yellow, skin-red, skin-green
    LAYOUT OPTIONS: fixed, layout-boxed, layout-top-nav , sidebar-collapse , sidebar-mini
     --}}
    <body class="skin-blue fixed sidebar-mini sidebar-mini-expand-feature">
        <div id="app" v-cloak>
            <div class="wrapper">
                @include('layouts.partials.mainheader')
                @include('layouts.partials.sidebar')
                <div class="content-wrapper">
                    @include('layouts.partials.contentheader')
                    <section class="content">
                        <!-- Your Page Content Here -->
                        @yield('main-content')
                    </section>
                </div>
                @include('layouts.partials.controlsidebar')
                @include('layouts.partials.footer')
            </div>
        </div>
        @section('scripts')
            @include('layouts.partials.scripts')
        @show
    </body>
</html>
