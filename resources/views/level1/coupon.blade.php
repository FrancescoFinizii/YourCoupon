@extends("layouts.public-layout")
@section("title", "Coupon")
@section("content")
    <div class="back-btn-cont">
        <a class="back-link" href="{{url("/user/coupon")}}">
            <img src="{{asset("/img/icon/left-arrow.png")}}" width="20" height="20" >back
        </a>
    </div>
    <section id="coupon">
        <div class="coupon-card">
            <div class="left-card">
                <img src="https://i.postimg.cc/KvTqpZq9/uber.png" id="company-logo">
                <h3>20% flat off on all rides within the cityusing HDFC Credit Card</h3>
                <div class="coupon-row">
                    <span id="promo-code">STEALDEAL20 {{$id}}</span>
                    <a href="#">View Promo</a>
                </div>
                <p>Validità: 20Dec, 2021</p>
            </div>
            <div class="right-card">
                <img id="qr-code" width=200px height=200px src="{{asset("img/qrcode.png")}}">
                <button class="btn-rect btn-light" type="button">Stampa</button>
            </div>
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
    </section>
@endsection
