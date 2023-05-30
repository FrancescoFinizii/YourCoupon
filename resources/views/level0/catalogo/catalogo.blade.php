<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catalogo</title>
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ludovico/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ludovico/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ludovico/style_aggiunto_da_ludovico.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="my-container">

    <div class="offers-list">


        <div>
            <div class="search-head">
                <h1 class="search-heading">Cerca coupon e offerte nel catalogo! </h1>
                <div>


                    {{--                    <form action="/action_page.php">--}}
                    {{ Form::open(['route' => 'search', 'method' => 'GET']) }}


                    {{ Form::text('searchbar', null, ['class'=>'catalogo-search-input', 'id' => 'search-input', 'placeholder' => 'Cerca coupon per azienda o parole chiave...', 'default' => null]) }}
                    {{ Form::select('select-aziende', $aziende, 'sss', ['class' => 'search-select', 'placeholder' => 'Filtra per azienda...']) }}

                    {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'bottone-cerca']) }}
                    {{ Form::close() }}

                    {{--                        <input id="search-input" type="text" placeholder="Cerca coupon per azienda o parole chiave..." name="searchbar">--}}
                    {{--                    <button class="bottone-cerca" type="submit"><i class="fa fa-search"></i></button>--}}
                    {{--                    </form>--}}
                </div>
            </div>
        </div>

        <div class="offers-container">

{{--            <h4>Ecco tutti i coupon offerti dalle nostre aziende!</h4>--}}
            @foreach ($aziendeConOfferte as $azienda)
                <div>
                    {{--                <div class="offers-container">--}}
                    {{--                    <h1>Coupon offerti da {{ $azienda->RagioneSociale }}</h1>--}}

                    @foreach ($azienda->offerte as $offerta)
                        <div class="catalogo-card">
                            <img src="https://upload.wikimedia.org/wikipedia/it/f/fc/Pippo_Disney.png"
                                 alt="Logo dell'azienda">
                            <h3>Coupon di {{ $azienda->RagioneSociale }}</h3>

                            <h4 style="color: black"> Ottieni un <b style="color: red">-{{ $offerta->Sconto }}%</b>
                                su {{$offerta->Titolo}}</h4>
                            <p>
                                <br>
                                Senza di noi lo avresti pagato <b>{{ $offerta->Prezzo }}€</b>!
                            </p>
                            {{--<p>
                                {{$offerta->Descrizione}}
                            </p>--}}
                            <a href="{{route('offerta', ['id'=> $offerta->IDOfferta])}}">
                                <button type="button">Scopri il coupon!</button>
                            </a>

                            {{--                            <button type="button" class="btn-margin">Scopri il coupon!</button>--}}
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
    <div class="paginator-container">
        @include('level3.faq.crud_faq.paginator', ['paginator' => $aziendeConOfferte])
    </div>
</div>

</body>
</html>
