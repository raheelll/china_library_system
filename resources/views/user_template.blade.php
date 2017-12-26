<!DOCTYPE HTML>
<html>
<head>
    <title>{{ $page_title or config('site_name') }}</title>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/css/style.css") }}" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <!-- Ladda spinner -->
    <link href="{{ asset("/bower_components/ladda/dist/ladda.min.css")}}" rel="stylesheet" type="text/css"/>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset("/bower_components/admin-lte/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- Header -->
@include('user.sections.header')

<!-- Body -->
@yield('content')

<!-- Footer -->
@include('user.sections.footer')

<script type="text/javascript" src="{{ asset("js/responsive-nav.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<!-- jQuery validation v1.14.0 -->
<script src="{{ asset("/js/jquery.validate.min.js") }}"></script>
<!-- jQuery validation v1.14.0 additional methods -->
<script src="{{ asset("/js/additional-methods.min.js") }}"></script>
<!-- Ladda spinner -->
<script src="{{ asset("/bower_components/ladda/dist/spin.min.js") }}"></script>
<script src="{{ asset("/bower_components/ladda/dist/ladda.min.js") }}"></script>
</body>
</html>
