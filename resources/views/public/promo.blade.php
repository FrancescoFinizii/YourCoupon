@extends("public.layout.public-layout")
@section("title", "Promo")
@section("content")
    <section class="promo-search">
        {{ Form::open(["route" => "promo", "method" => "GET" ]) }}
        <div class="search-bar">
            {{Form::text("search", app('request')->input('search'), ["id" => "search", "class" => "input", "placeholder" => "Ricerca un offerta o un azienda"])}}
            <button class="btn-blue" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        {{ Form::close() }}
    </section>
    <section class="promo-result">
        @forelse($offerte as $offerta)
            <div class="promo-item">
                <div class="promo-sconto flex-centered">
                    <span>@if($offerta->sconto != 100){{$offerta->sconto}}%<br>SCONTO @else OMAGGIO @endif</span>
                </div>
                <div class="promo-content">
                    <h3>{{$offerta->oggetto}}</h3>
                    <div class="promo-description">
                        <p>{{$offerta->descrizione}}</p>
                        <a href="{{route("promo.show", $offerta->id)}}" class="std-link">➤ Visualizza offerta</a>
                    </div>
                </div>
                <div class="promo-effect">
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
                <div class="promo-link">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>
                        <p>Valida fino a {{$offerta->scadenza}}</p>
                    </div>
                    @can("isClient")
                        {{ Form::open([]) }}
                        {{ Form::button("Ottieni", ["class" => "btn btn-green", "type" => "submit"]) }}
                        {{ form::close() }}
                    @endcan
                    @guest
                        <a href="{{route("login")}}" class="btn btn-green">Ottieni</a>
                    @endguest
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                <p>Nessun risultato</p>
            </div>
        @endforelse
            {{ $offerte->withQueryString()->links("component.pagination") }}
    </section>
@endsection
