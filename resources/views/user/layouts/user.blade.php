<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('users/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('users/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('users/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('users/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('users/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('users/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('users/css/responsive.css') }}" rel="stylesheet">
    <script src="{{ asset('users/js/html5shiv.js') }}"></script>
    <script src="{{ asset('users/js/respond.min.js') }}"></script>

    <link rel="shortcut icon" href="{{ asset('users/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('users/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('users/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('users/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('users/images/ico/apple-touch-icon-57-precomposed.png') }}">



    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('user.partials.header')
        @yield('content')
        @include('user.partials.footer')
    </div>

    <script src="{{ asset('users/js/jquery.js') }}"></script>
    <script src="{{ asset('users/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('users/js/price-range.js') }}"></script>
    <script src="{{ asset('users/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('users/js/main.js') }}"></script>

    @yield('js')
</body>

</html>
