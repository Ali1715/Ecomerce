<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Links de template -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('admin/static/img/icons/icon-48x48.jpg') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="{{ asset('admin/static/css/app.css ') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- *************************************************************************************************************   -->

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('cliente/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('cliente/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('cliente/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('cliente/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('cliente/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('cliente/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

    <!-- **************************************************************************************************************************************************************    -->

    <div class="wrapper">
        <div class="main">
            @include('cliente.header')
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
            </main>
        </div>
    </div>

    <!--*************************************************************************************************************************************** -->

    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('cliente/js/jquery.min.js') }}"></script>
    <script src="{{ asset('cliente/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('cliente/js/slick.min.js') }}"></script>
    <script src="{{ asset('cliente/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('cliente/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('cliente/js/main.js') }}"></script>
    <script src="{{ asset('admin/static/js/app.js') }}"></script>
</body>

</html>
