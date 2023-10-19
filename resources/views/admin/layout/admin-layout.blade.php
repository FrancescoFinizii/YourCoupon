<!DOCTYPE html>
<html lang="it">
<head>
    <title>
        @yield("title")
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset ("css/elements.css") }}">
    <link rel="stylesheet" href="{{asset ("css/style.css") }}">
    <script type="text/javascript" src="{{asset("js/script.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/admin.js")}}"></script>
    @stack('javascript')
</head>
<body>
@include("public.navbar.main-navbar")
@include("admin.navbar.admin-navbar")
@yield('content')
@include("component.footer")
</body>
</html>
