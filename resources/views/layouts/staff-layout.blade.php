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
    @if (View::getSection('title')=='Abbina Offerte')
        <link rel="stylesheet" href="{{asset ("css/kristian/addtocart.css") }}">
    @else
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="{{asset("js/francesco.js")}}"></script>
    @endif
    <link rel="stylesheet" href="{{asset ("css/kristian/miostile.css") }}">
    <link rel="stylesheet" href="{{asset ("css/francesco/elements.css") }}">
    <link rel="stylesheet" href="{{asset ("css/francesco/style.css") }}">
    @yield('link')
    <link rel="stylesheet" href="{{ asset('css/christian/crud_stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/christian/modal-style.css') }}">

</head>
<body>
@include("component.main-navbar")
@include("component.staff-navbar")
<div class="my-container" style="background-image:url({{url('img/statistic.jpg')}}">
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>ATTENZIONE! Si sono verificati i seguenti errori:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <p class="alert alert-success">{{ $message }}</p>
    @endif
    @yield("content")
</div>
@include("component.footer")
</body>
</html>
