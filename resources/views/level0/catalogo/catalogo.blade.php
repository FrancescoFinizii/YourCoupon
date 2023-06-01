@extends('layouts.catalogo_layout')
@section('title', 'Catalogo')
@section('catalogo-content')
    <div class="offers-list">
        <div>
            <div class="search-head">
                <h1 class="search-heading">Cerca coupon e offerte nel catalogo! </h1>
                <div>
                    {{ Form::open(['route' => 'search', 'method' => 'GET', 'id' => 'search-form']) }}

                    {{ Form::token() }}
                    {{ Form::text('searchbar', null, ['class'=>'catalogo-search-input', 'id' => 'search-input', 'placeholder' => 'Cerca coupon per azienda o parole chiave...', 'default' => null]) }}
                    {{ Form::select('select-aziende', $aziende, null, ['class' => 'search-select', 'placeholder' => 'Filtra per azienda...']) }}
                    @if ($errors->first('searchbar'))
                        <ul>
                            @foreach ($errors->get('searchbar') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {{ Form::button('<i class="fa fa-search"></i>', ['id'=>'search-button','type' => 'submit', 'class' => 'bottone-cerca']) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>

        <div class="offers-container">

            <div class="offers-list">


                @if(isset($ricerca))
                    <div>
                        <h1>Coupon trovati per: {{ $ricerca }}</h1>

                        @foreach ($offerte as $offerta)
                            <div class="catalogo-card">


                                <img src="{{ asset('img/products/'.$offerta->FotoProd) }}" alt="FotoProdotto">
                                @foreach ($aziende as $idAzienda => $ragioneSociale)
                                    @if ($idAzienda == $offerta->Azienda)
                                        @if ($offerta->azienda)
                                            <h3>Offerto da {{ $offerta->azienda->RagioneSociale }}</h3>
                                        @endif
                                    @endif
                                @endforeach

                                <h4 style="color: black"> Ottieni un <b style="color: red">-{{ $offerta->Sconto }}%</b>
                                    su {{$offerta->Titolo}}</h4>
                                <p>
                                    Senza di noi lo pageresti <b>{{ $offerta->Prezzo }}€</b>!
                                </p>
                                <p>Scade il: {{ $offerta->Scadenza }}</p>
                                <p id="scadenza">scadenza</p>
                                <a href="{{route('offerta', ['id'=>$offerta->IDOfferta])}}">
                                    <button type="button">Scopri il coupon!</button>
                                </a>
                            </div>
                        @endforeach
                    </div>
            </div>
            @else

                @foreach ($aziendeConOfferte as $azienda)
                    <div>

                        @foreach ($azienda->offerte as $offerta)
                            <div class="catalogo-card">


                                <img src="{{ asset('img/products/'.$offerta->FotoProd) }}" alt="FotoProdotto">
                                <h3>Offerto da {{ $azienda->RagioneSociale }}</h3>

                                <h4 style="color: black"> Ottieni un <b style="color: red">-{{ $offerta->Sconto }}%</b>
                                    su {{$offerta->Titolo}}</h4>
                                <p>
                                    Senza di noi lo pageresti:
                                    <br>
                                    <b>{{ $offerta->Prezzo }}€</b>!
                                </p>
                                <p>Scade il: {{ $offerta->Scadenza }}</p>
                                <a href="{{route('offerta', ['id'=> $offerta->IDOfferta])}}">
                                    <button type="button">Scopri il coupon!</button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    @if(isset($ricerca))
        @if ($offerte->hasPages())
            <div class="paginator-container">
                @include('paginator', ['paginator' => $offerte])
            </div>
        @endif
    @else
        @if ($aziendeConOfferte->hasPages())
            <div class="paginator-container">
                @include('level3.paginator', ['paginator' => $aziendeConOfferte])
            </div>
        @endif
    @endif
@endsection
