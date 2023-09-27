@extends("public.layout.public-layout")
@section("title", "Promo - " . $offerta->id)
@section("content")
    <div class="back-btn-cont">
        <a class="btn-rect btn-black" href="{{url()->previous()}}">
            <div class="flex-centered">
                <img src="{{asset("/img/icon/left-arrow.png")}}" width="20" height="20">BACK
            </div>
        </a>
    </div>
    <section class="product-section">
        <div>
            <div class="product-image">
                <div class="product-sales">
                    -{{$offerta->sconto}}%
                </div>
                <img src="{{$offerta->foto != null ? asset($offerta->foto) : asset($offerta->azienda->logo)}}">
            </div>
            <div class="product-details">
                <div class="product-title">
                    <div class="product-title-border"></div>
                    <h1>{{$offerta->oggetto}}</h1>
                </div>
                <div class="product-brand">
                    {{$offerta->azienda->ragioneSociale}}
                </div>
                @if($offerta->prezzo != null)
                    <div class="product-price">
                        {{$offerta->prezzo}} €
                    </div>
                @endif
                <div class="product-time">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                    Scadenza: {{$offerta->scadenza}}
                </div>
                @can("isClient")
                    <button class="btn-rect btn-large btn-green">Ottieni Coupon</button>
                @endcan
            </div>
        </div>
        <div class="product-description">
            <h2>Descrizione:</h2>
            <p>
                {{$offerta->descrizione}}
            </p>
        </div>
    </section>
@endsection
