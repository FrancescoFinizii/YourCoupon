@extends("public.layout.public-layout")
@section("title", "Home")
@section("content")
    <section id="welcome" style="background-image:url({{url('img/background2.png')}});">
        <div>
            <span id="welcome-text">Welcome to YourCoupon!</span>
            <p id="welcome-paragraph">The #1 website to find the best deals for yourself.</p>
            <a href="">
                <button class="btn btn-blue" type="button">Get start</button>
            </a>
            <a href="">
                <button class="btn btn-blue" type="button">More info</button>
            </a>
        </div>
    </section>
    <section id="latest-company">
        <h1>I nostri partner</h1>
        <div class="scrolling-wrapper-flexbox">
            @foreach(\App\Models\Azienda::all()->take(5) as $azienda)
                <div class="company-item">
                    <img src="{{asset($azienda->logo)}}">
                </div>
            @endforeach
        </div>
    </section>
@endsection
