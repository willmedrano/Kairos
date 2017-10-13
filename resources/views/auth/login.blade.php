{{-- <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login Kairos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
    </head>
    <body>
      <div class="auth">
        <div class="auth-container">
          <div class="card">
            <header class="auth-header">
              <h1 class="auth-title">
                <div class="logo">
                	<span class="l l1"></span>
                	<span class="l l2"></span>
                	<span class="l l3"></span>
                	<span class="l l4"></span>
                	<span class="l l5"></span>
                </div>        KAIROS
              </h1>
            </header>
            <div class="auth-content">
              <p class="text-xs-center">Inicie Sesión</p>
              {!!Form::open(['route'=>'home.store','method'=>'POST'])!!}
              {{-- <form id="login-form" action="{{ url('/') }}" method="GET" novalidate=""> --}}
                {{--
                <div class="form-group"> <label for="username">Email</label> <input type="email" class="form-control underlined" name="username" id="username" placeholder="Your email address" required> </div>
                <div class="form-group"> <label for="password">Contraseña</label> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> </div>
                <div class="form-group"> <label for="remember"></label>
                  <a href="reset.html" class="forgot-btn pull-right"><a class="btn btn-link" href="{{ url('/password/reset') }}">¿ Olvidaste tu contraseña ?</a>
                </div>
                <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Login</button> </div>
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>
      <!-- Reference block for JS -->
      <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
          <div class="color-primary"></div>
          <div class="color-secondary"></div>
        </div>
      </div>
      <script src="js/vendor.js"></script>
      <script src="js/app.js"></script>
    </body>
</html> --}}

@extends('layouts.app')

@section('content')

<div class="container">
  <div align="right" class="col-xs-12">
    <img src="/Kairos/public/img/seguridad.jpg" class="" alt="User Image" width="200px" height="100px">
  </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Inicio de Sesión</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    ¿ Olvidaste tu contraseña ?
                                </a>

                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
