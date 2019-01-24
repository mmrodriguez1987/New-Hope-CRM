@extends('layouts.app')

@section('contentheader_title')
Dashboard
@endsection

@section('contentheader_description')
You can chek all information about this Dashboard
@endsection

@section('htmlheader_title')
New Hope In Christ | CRM
@endsection

@section('main-content')
  <router-view></router-view>
@endsection
