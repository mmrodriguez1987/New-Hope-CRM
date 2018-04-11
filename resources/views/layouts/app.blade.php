<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    @section('htmlheader')
        @include('backend.layouts.partials.htmlheader')
    @show
    {{--
        BODY TAG OPTIONS:
            SKINS: skin-blue, skin-black, skin-purple, skin-yellow, skin-red, skin-green
            LAYOUT OPTIONS: fixed, layout-boxed, layout-top-nav , sidebar-collapse , sidebar-mini
     --}}
    <body class="skin-blue fixed sidebar-mini sidebar-mini-expand-feature">
        <div id="app" v-cloak>
            <div class="wrapper">
                @include('backend.layouts.partials.mainheader')
                @include('backend.layouts.partials.sidebar')
                <div class="content-wrapper">
                    @include('backend.layouts.partials.contentheader')
                    <section class="content">
                        <!-- Your Page Content Here -->
                        @yield('main-content')
                    </section>
                </div>
                @include('backend.layouts.partials.controlsidebar')
                @include('backend.layouts.partials.footer')
            </div>
        </div>
        @section('scripts')
            @include('backend.layouts.partials.scripts')
        @show
    </body>
</html>
