<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KAIROS</title>

    <!-- Styles -->
    <link href="/Kairos/public/css/app.css" rel="stylesheet">
    <link href="/Kairos/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <header>
                  <div align="right" class="col-xs-4">
                      <img src="/Kairos/public/img/alcaldia.png" class="" alt="User Image" width="150px" height="150px">
                    </div>

                    <h1 class="auth-title">
                      <div class="logo">
                      	<span class="l l1"></span>
                      	<span class="l l2"></span>
                      	<span class="l l3"></span>
                      	<span class="l l4"></span>
                      	<span class="l l5"></span>
                      </div>KAIROS
                    </h1>
                    <h3>Alcaldia Municipal de Ilobasco</h3>
                  </header>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/Kairos/public/js/app.js"></script>
</body>
</html>
