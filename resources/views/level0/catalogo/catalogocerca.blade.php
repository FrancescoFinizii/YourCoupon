<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catalogo</title>
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/ludovico/elements.css') }}">--}}
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


                    {{ Form::open(['route' => 'search', 'method' => 'GET']) }}
                    {{ Form::text('searchbar', null, ['class'=>'catalogo-search-input', 'id' => 'search-input', 'placeholder' => 'Cerca coupon per azienda o parole chiave...']) }}
                    {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'bottone-cerca']) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
            <div>
                <div class="offers-container">
                    <h1>Coupon trovati per: {{ $ricerca }}</h1>

                    @foreach ($offerte as $offerta)
                        <div class="catalogo-card">

                            <img src="https://upload.wikimedia.org/wikipedia/it/f/fc/Pippo_Disney.png"
                                 alt="Logo dell'azienda">
{{--                            <h3>Coupon di {{ $azienda->RagioneSociale }}</h3>--}}
{{--                            <h3>Coupon di {{ $offerta->Azienda }}</h3>--}}
                            <h3>
                                <b style="color: red">-{{ $offerta->Sconto }}%</b> su {{$offerta->Titolo}}
                            </h3>
                            <p><b><del>{{ $offerta->Prezzo }} €</del></b></p>
                            <p>Scade il: {{ $offerta->Scadenza }}</p>
                            <a href="{{route('offerta', ['id'=>$offerta->IDOfferta])}}"><button type="button">Scopri il coupon!</button></a>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
    <div class="paginator-container">
        @include('level3.faq.crud_faq.paginator', ['paginator' => $offerte])
    </div>
</div>

</body>
</html>
