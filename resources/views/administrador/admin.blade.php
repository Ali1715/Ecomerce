<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<!-- **************************************************************************************************** -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

</head>
<body>




<div class="wrapper">

    @include('administrador.sidebar')

    <div class="main">
        
    @include('administrador.navbar')
    
   
    <main class="content">
 
				<div class="container-fluid p-0">
        
 
                @yield('content')    
  
</main>

</div>

</div>
</div>

<!-- **************************************************************************************************************************************************************    -->


	<script src="{{ asset('admin/static/js/app.js') }}"></script>







<!--*************************************************************************************************************************************** -->



</body>
</html>