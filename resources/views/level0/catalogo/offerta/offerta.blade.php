@extends('layouts.catalogo_layout')
@section('title', 'Offerta')
@section('scripts')
    <script src="{{ asset('js/ludovico/offerta.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('catalogo-content')




    <div class="offerta">
        <div class="offerta-informazioni">
            <div class="div-image-offerta">
                <img src="{{ asset('img/products/'.$offerta->FotoProd) }}" alt="img_offerta">
            </div>
            <div class="sconto-div">
                <h1>CODICE SCONTO del -{{ $offerta->Sconto }}%!</h1>
                <p>Ricevi uno sconto del <b>{{ $offerta->Sconto }}%</b> sull'acquisto di {{$offerta->Titolo}}!</p>
                <p>Lo paghi <b>solo <span class="prezzo-scontato">{{ number_format($prezzoScontato, 2, ',', '.') }} €</span></b></p>
                <p>Invece di <b>{{ $offerta->Prezzo }}</b> €</p>

                <button class="btn-pagina-offerta btn-offerta-coupon" type="button">
                    OTTIENI IL TUO COUPON
                </button>
                <button class="btn-pagina-offerta btn-azienda-coupon" type="button">
                    LINK AL SITO DELL'AZIENDA
                </button>
            </div>
        </div>

        <div class="info-offerta">
            <div class="info-offerta-div">
                <h3>Ulteriori informazioni:</h3>
                <p>
                    Scopri il nuovo codice sconto di
                    {{ $azienda->RagioneSociale }}: {{$offerta->Descrizione}}. Valido su una serie di prodotti
                    selezionati.
                    <br>
                    Consigliamo di verificare i termini di consume e validità sul sito del'azienda offerente.
                </p>
                <h3>Modalità di fruizione:</h3>
                <p>
                    Utilizzabile presso il {{ $offerta->Fruizione }} dell'offerente. valido fino alla scadenza
                    dell'offerta
                </p>
            </div>
            <script src="{{ asset('js/ludovico/offerta.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <div class="dettagli-offerta">
                <h3>Affrettati! Scade il: </h3>
                {{--                <p> Timer es. 19 giorni, 3 ore.. (php)</p>--}}
                <p id="timer">{{ $offerta->Scadenza }}</p>

                <h3>Promozione iniziata il:</h3>
                <p> {{ $offerta->Inizio }} </p>
            </div>
            <div class="dettagli-offerta">
                <h3>
                    Azienda offerente:</h3>
                <p>{{ $azienda->RagioneSociale }}</p>
                <h3>Contatti
                    dell'azienda:</h3>
                <p>
                    Telefono: {{ $azienda->Telefono }}
                    <br>
                    Email: {{ $azienda->Mail }}
                </p>
            </div>


        </div>

        <div class="scopri-altro">
            <h4>Scopri altre offerte sul nostro <a href="{{ route('catalogo') }}">catalogo</a>!</h4>
            <h5>Oppure torna alla <a href="/">home</a> per scoprire le novità.</h5>
        </div>


    </div>






@endsection
