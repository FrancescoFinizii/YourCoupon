<!DOCTYPE html>
<html lang="it">
<head>
    <title>
        @yield("title")
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset("js/francesco.js")}}"></script>
    <link rel="stylesheet" href="{{asset ("css/francesco/elements.css") }}">
    <link rel="stylesheet" href="{{asset ("css/francesco/style.css") }}">

</head>
<body>
@include("component.main-navbar")
<div class="my-container">
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
        <div class="wrapper-dashboard">
        <div class="left-menu">
            <h2 id="profile-username">Cicciogamer89</h2>
            @include("component.profile-image")
            @include("component.user-navbar")
        </div>
        <div class="right-menu">
            @yield("content")
        </div>
    </div>
</div>
@include("component.footer")
</body>
</html>
