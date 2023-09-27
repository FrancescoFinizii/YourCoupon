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
    @stack('javascript')
</head>
<body>
@include("public.navbar.main-navbar")
@include("staff.navbar.staff-navbar")
<section class="management-section" style="background-image: url({{url('img/background3.jpg')}})">
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>ATTENZIONE! Si sono verificati i seguenti errori:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        <p>{{ $error }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <p class="alert alert-success">{{ $message }}</p>
    @endif
    @yield('content')
</section>
@include("component.footer")
<script type="text/javascript" src="{{asset("js/script.js")}}"></script>
<script type="text/javascript" src="{{asset("js/staff.js")}}"></script>
</body>
</html>
