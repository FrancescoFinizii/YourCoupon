@extends("layouts.public-layout")
@section("title", "Home")
@section("content")
    <section id="welcome" style="background-image:url({{url('img/background2.png')}});">
        <div>
            <span id="welcome-text">Welcome to YourCoupon!</span>
            <p id="welcome-paragraph">The #1 website to find the best deals for yourself.</p>
            <button class="btn btn-blue" type="button">Get Promo</button>
            <button class="btn btn-blue" type="button">More info</button>
        </div>
    </section>
    <section id="latest-company">
        <h1>Latest Company</h1>
        <div class="scrolling-wrapper-flexbox">
            <div class="company-item">
                <img src="{{asset("img/bmw.png")}}">
            </div>
            <div class="company-item">
                <img src="{{asset("img/durex.jpg")}}">
            </div>
            <div class="company-item">
                <img src="{{asset("img/lego.png")}}">
            </div>
            <div class="company-item">
                <img src="{{asset("img/nike.png")}}">
            </div>
            <div class="company-item">
                <img src="{{asset("img/nba.png")}}">
            </div>
        </div>
    </section>
    <section id="latest-promo">
        <h1>Latest Promo</h1>
        <div class="scrolling-wrapper-flexbox">

        </div>
    </section>
    <section id="team">

    </section>
@endsection
