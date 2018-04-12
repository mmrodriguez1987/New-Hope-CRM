@extends('layouts.auth')

@section('htmlheader_title')
    Password recovery
@endsection

@section('content')

    <body class="login-page">
    <div id="app">

        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('home') }}"><b>New Hope </b>CRM</a>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg">Reset Password</p>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" autofocus/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-2">
                        </div>
                        <div class="col-xs-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('message.sendpassword') }}</button>
                        </div>
                        <div class="col-xs-2">
                        </div>
                    </div>
                </form>

                <a href="{{ route('login') }}">Log in</a><br>
                <a href="{{ route('register') }}" class="text-center">{{ trans('message.registermember') }}</a>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>

    @include('layouts.partials.scripts_auth')

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    </body>

@endsection
