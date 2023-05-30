<!DOCTYPE html>
<html lang="it">
<head>
    <title>
        @yield("title")
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{asset("js/javascript.js")}}"></script>
    <link rel="stylesheet" href="{{asset ("css/francesco/elements.css") }}">
    <link rel="stylesheet" href="{{asset ("css/francesco/style.css") }}">
    <link rel="stylesheet" href="{{ asset('css/christian/crud_stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/christian/modal-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/christian/style.css') }}">
</head>
<body>
    @include("component.main-navbar")
    @include("component.admin-navbar")
        @yield('content')
    @include("component.footer")
</body>
</html>
