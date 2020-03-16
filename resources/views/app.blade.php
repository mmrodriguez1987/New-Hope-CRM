<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="UTF-8">
        <title>New Hope Dasboard</title>        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! Html::style('css/app.css') !!}
        {!! Robots::metaTag() !!}
    <body>
        <div id="app">
            <router-view> </router-view>            
        </div>
        {!! Html::script('js/app.js') !!}            
        {{-- {!! Html::script('js/lang.js') !!} --}}
    </body>
</html>