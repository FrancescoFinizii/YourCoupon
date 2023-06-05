<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Catalogo')</title>
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
    <link rel="stylesheet" href="{{asset ("css/ludovico/nav_foot.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="{{ asset('js/ludovico/offerta.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scripts')

</head>
<body>

@include("component.main-navbar")
<div class="my-container">
    @yield('catalogo-content')
</div>
@include("component.footer")

</body>
</html>
