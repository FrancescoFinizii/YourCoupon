<nav class="main-nav">
    <a href="{{url("/")}}" id="logo">
        <img src="{{asset("img/YourCoupon-logo.png")}}" width="200" height="100">
    </a>
    <button class="navbar-toggler" onclick="openMainNav()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
    <div class="main-nav-link" id="main-nav-link">
        <ul>
            <li><a href="{{url("/")}}" class="nav-link">Home</a></li>
            <li><a href="{{route('catalogo')}}" class="nav-link">Catalogo</a></li>
            <li><a href="{{route('faq')}}" class="nav-link">FAQ</a></li>
            <li><a href="{{route('about')}}" class="nav-link">About us</a></li>
            @can('isAdmin')
{{--                <li><a href="{{ route('admin') }}" class="nav-link" title="Home Admin">Home Admin</a></li>--}}
                <li><a href="{{ route('homeAdmin') }}" class="nav-link" title="Home Admin">Home Admin</a></li>
            @endcan
            @can('isStaff')
                {{--                <li><a href="{{ route('user') }}" class="nav-link" title="Home User">Home User</a></li>--}}
                <li><a href=" " class="nav-link" title="Home Staff">Home Staff</a></li>
            @endcan
            @can('isUser')
{{--                <li><a href="{{ route('user') }}" class="nav-link" title="Home User">Home User</a></li>--}}
                <li><a href=" " class="nav-link" title="Home User">Home User</a></li>
            @endcan





        </ul>
    </div>
    <div class="main-nav-link-btn" id="main-nav-link-btn">
        @auth
            {{ Form::open(['route' => 'logout', 'method'=>'post', 'class' => 'myform']) }}
            {{ Form::token() }}
            {{ Form::submit('Logout', ['class' => 'btn btn-blue btn-large']) }}
            {{ Form::close() }}
        @endauth
        @guest
                <a id="btn-blue" class="btn btn-blue active" role="button" href="{{route("login")}}">Log in</a>
                <a id="btn-light" class="btn btn-light" role="button" href="{{route("register")}}">Sign up</a>
        @endguest
    </div>
</nav>
