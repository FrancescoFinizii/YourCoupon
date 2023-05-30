<!DOCTYPE HTML>
<html>
<head>
    <!--per far si che il layout si adatti alla finestra-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Layout')</title>
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">


</head>
<body>


<div class="container">
    @yield('crudfaq-content')
</div>
</body>
</html>
