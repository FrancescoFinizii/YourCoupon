@extends("public.layout.public-layout")
@section("title", "Coupon")
@section("content")
    <div class="back-btn-cont flex-between">
        <a class="btn-rect btn-black " href="{{route("cliente.coupon")}}">
            <div class="flex-centered">
                <img src="{{asset("/img/icon/left-arrow.png")}}" width="20" height="20">
                BACK
            </div>
        </a>
    </div>
    <section id="coupon-section">
        <div class="coupon-card">
            <div class="left-card">
                <img src="{{asset($coupon->offerta->foto != null ? $coupon->offerta->foto : $coupon->offerta->azienda->logo)}}" id="company-logo">
                <a style="color: white; text-decoration: none; " href="">
                    <h3>{{$coupon->offerta->oggetto}}</h3>
                </a>
                <div class="coupon-row">
                    <span id="promo-code">ID Coupon</span>
                    <span class="coupon-code">{{$coupon->id}}</span>
                </div>
                <p>Scadenza: {{$coupon->offerta->scadenza}}</p>
            </div>
            <div class="right-card">
                <img id="qr-code" width=200px height=200px src="{{asset("img/qr-code.png")}}">
                <p><b>Username:</b> {{$coupon->cliente->utente->username}}</p>
                <p><b>Nome:</b> {{$coupon->cliente->nome}}</p>
                <p><b>Cognome:</b> {{$coupon->cliente->cognome}}</p>
            </div>
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
    </section>
@endsection
