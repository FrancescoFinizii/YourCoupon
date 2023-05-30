<script>
    $(document).ready(function(){
        $('.user-navbar-link').click(function(){
            $('.user-navbar-link').removeClass('active');   // it remove all the active links
            $(this).addClass('active');    // it adds active class to the current link you have opened
        });
    });
</script>
<nav class="user-navbar" role="navigation">
    <ul>
        <li>
            <a class="user-navbar-link" href="{{url("/user/profile")}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-fill" style="font-size: 22px;margin-right: 10px;">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                </svg>Account
            </a>
        </li>
        <li>
            <a class="user-navbar-link" href="{{url("/user/password")}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-lock-fill" style="font-size: 22px;margin-right: 10px;">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                </svg>Password
            </a>
        </li>
        <li>
            <a class="user-navbar-link" href="{{url("/user/coupon")}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 22px;margin-right: 10px;">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.79166 2H1V4H4.2184L6.9872 16.6776H7V17H20V16.7519L22.1932 7.09095L22.5308 6H6.6552L6.08485 3.38852L5.79166 2ZM19.9869 8H7.092L8.62081 15H18.3978L19.9869 8Z" fill="currentColor"></path>
                    <path d="M10 22C11.1046 22 12 21.1046 12 20C12 18.8954 11.1046 18 10 18C8.89543 18 8 18.8954 8 20C8 21.1046 8.89543 22 10 22Z" fill="currentColor"></path>
                    <path d="M19 20C19 21.1046 18.1046 22 17 22C15.8954 22 15 21.1046 15 20C15 18.8954 15.8954 18 17 18C18.1046 18 19 18.8954 19 20Z" fill="currentColor"></path>
                </svg>Coupon
            </a>
        </li>
    </ul>
</nav>
