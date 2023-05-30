<nav class="main-nav">
    <a href="{{url("/")}}" id="logo">
        <img src="{{asset("img/YourCoupon-logo.png")}}" width="200" height="100">
    </a>
    <button class="navbar-toggler" onclick="openMainNav()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
    <div class="main-nav-link" id="main-nav-link">
        <ul>
            <li><a href="{{url("/")}}" class="nav-link" >Home</a></li>
            <li><a href="{{url("/company")}}" class="nav-link">Company</a></li>
            <li><a href="{{url("/FAQ")}}" class="nav-link">FAQ</a></li>
            <li><a href="{{url("/about")}}" class="nav-link">About</a></li>
        </ul>
    </div>
    <div class="main-nav-link-btn" id="main-nav-link-btn">
        <a id="btn-blue" class="btn btn-blue active" role="button" href="{{url("/login")}}">Log in</a>
        <a id="btn-light" class="btn btn-light" role="button" href="{{url("/registration")}}">Sign up</a>
    </div>
</nav>
