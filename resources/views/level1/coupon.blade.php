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
{{--                <img  width="100px" height="100px" style=" object-fit: cover;" src="{{ asset('img/products/'.$offerta->FotoProd) }}" alt="FotoProdotto">--}}
{{--                <img width="40px" height="40px" style=" object-fit: cover;" src="https://i.postimg.cc/KvTqpZq9/uber.png" id="company-logo">--}}
                <h3>Offerta di {{ $azienda->RagioneSociale }}</h3>
                <h4>{{ $offerta->Descrizione }}</h4>
                <div class="coupon-row">
                    <span id="promo-code">{{$coupon->IDCoupon}}</span>
                    <a href="{{route('offerta', ['id'=>$offerta->IDOfferta])}}">Vedi Promo</a>
                </div>
                <p>Scadenza: {{ $offerta->Scadenza }}</p>
            </div>
            <div class="right-card">
                <img id="qr-code" width=200px style="margin: 20px" height=200px src="{{asset("img/qrcode.png")}}">
                <button class="btn-rect btn-light" type="button">Stampa</button>
            </div>
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
    </section>
@endsection
