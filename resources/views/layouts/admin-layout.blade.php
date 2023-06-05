<!DOCTYPE html>
<html lang="it">
<head>
    <title>
        @yield("title")
    </title>
    @section('scripts')
    @show
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ("css/francesco/elements.css") }}">
    <link rel="stylesheet" href="{{asset ("css/francesco/style.css") }}">
    <link rel="stylesheet" href="{{asset("css/kristian/statistic.css")}}">
    @yield('link')
    <link rel="stylesheet" href="{{ asset('css/christian/crud_stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/christian/modal-style.css') }}">
</head>
<body>
    @include("component.main-navbar")
    @include("component.admin-navbar")
        @yield('content')
    @include("component.footer")
</body>
</html>
