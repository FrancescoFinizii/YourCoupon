<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TecWeb</title>
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
</head>
<body>
<div class="container">
    <div class="offerta">
        <div class="offerta-informazioni">
            <div class="div-image-offerta">
                <img src="https://www.ibs.it/images/4718017502436_0_5_536_0_75.jpg"
                     alt="img_offerta">
            </div>
            <div class="sconto-div">
                <h1>CODICE SCONTO! -{{ $offerta->Sconto }}%!</h1>
                <p>Ricevi uno sconto del <b>{{ $offerta->Sconto }}%</b> sull'acquisto di {{$offerta->Titolo}}!</p>
                <p>Lo paghi <b>solo <span class="prezzo-scontato">{{ $prezzoScontato }} €</span></b></p>
                <p>Invece di <b>{{ $offerta->Prezzo }}</b> €</p>
                <button class="btn-pagina-offerta btn-offerta-coupon" type="button">
                    OTTIENI IL TUO COUPON
                </button>
                <a class="btn-pagina-offerta btn-azienda-coupon" type="button" href="/azienda/{{ $azienda->IDAzienda }}">
                    Azienda
                </a>
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

            <div class="dettagli-offerta">
                <h3>Affrettati! Scade fra: {{ $offerta->Scadenza }}</h3>
{{--                <p> Timer es. 19 giorni, 3 ore.. (php)</p>--}}
                <p id="timer"> </p>
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
            <h4>Scopri altre offerte sul nostro <a href="">catalogo</a>!</h4>
            <h5>Oppure torna alla <a href="">home</a> per scoprire le novità.</h5>
        </div>


    </div>


</div>

</body>
</html>
