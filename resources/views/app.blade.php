@extends('layouts.app')

@section('contentheader_title')
Dashboard
@endsection

@section('contentheader_description')
You can chek all information about this Dashboard
@endsection

@section('htmlheader_title')
Dashboard
@endsection

@section('main-content')
  <router-view></router-view>
@endsection
