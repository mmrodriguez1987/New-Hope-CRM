<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>        
        <title>{{ trans('bck.general.app_name') }}</title>
        <meta charset="UTF-8">        
        <meta name="csrf-token" content="{{ csrf_token() }}">       
        <link rel="stylesheet" href="{{url('css/app.css')}}" >
    </head>
    <body>
        <div id="app">
            <router-view></router-view>          
        </div>        
        <script src="{{url('js/app.js')}}"></script>
        <script src="{{url('js/lan.js')}}"></script>
    </body>
</html>


