@extends("layouts.user-layout")
@section("title", "User - Coupon")
@section("content")
    <div class="schede" id="coupon-div">
        <h1>My coupon</h1>
        <div class="user-coupon">
            <a class="coupon-item" href="{{url("/user/coupon/1")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/2")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/3")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/4")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/5")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/6")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/7")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
            <a class="coupon-item" href="{{url("/user/coupon/8")}}">
                <img src="{{asset("img/qrcode.png")}}">
                <p>promo nome</p>
            </a>
        </div>
    </div>
@endsection
