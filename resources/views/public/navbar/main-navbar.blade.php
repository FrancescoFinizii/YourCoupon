<nav class="main-nav flex-between" id="main-nav">
    <div class="logo-container">
        <a href="{{route('home')}}">
            <img src="{{asset("img/YourCoupon-logo.png")}}" width="200" height="100">
        </a>
    </div>
    <button id="navbar-toggler" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
    <div id="main-nav-link" class="main-nav-link">
        <ul class="flex-between">
            <li><a href="{{route('home')}}" class="nav-link">Home</a></li>
            <li><a href="{{route('promo')}}" class="nav-link">Promo</a></li>
            <li><a href="{{route('faq')}}" class="nav-link">FAQ</a></li>
            <li><a href="{{route('about')}}" class="nav-link">About</a></li>
            @can('isClient')
                <li><a href="{{route("cliente.edit.profile")}}" class="nav-link">My Area</a></li>
            @endcan
        </ul>
    </div>
    <div class="main-nav-link-btn flex-between" id="main-nav-link-btn">
        @guest
            <a id="btn-login" class="btn btn-blue" href="{{route("login")}}">Log in</a>
            <a id="btn-signup" class="btn btn-light" href="{{route("register")}}">Sign up</a>
        @else
            <a id="btn-logout" class="btn btn-blue" href="{{route("logout")}}">Logout</a>
        @endguest
    </div>
</nav>

