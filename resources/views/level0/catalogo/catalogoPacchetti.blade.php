@extends('layouts.catalogo_layout')
@section('title', 'Catalogo')
@section('catalogo-content')
    <div class="offers-list">
        <div>
            <div class="search-head">
                <h1 class="search-heading">Cerca offerte nel catalogo! </h1>
                <div>
                    {{ Form::open(['route' => 'searchAbbinate', 'method' => 'GET', 'id' => 'search-form']) }}
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

        <div class="offers-container" style="text-align: center">

{{--            <div class="offers-abbinate-list">--}}


                @if(isset($ricerca))
                    <div>
                        <h1>Pacchetti che contengono offerte per: {{ $ricerca }}</h1>
                        @foreach ($pacchetti as $pacchetto)
                            @foreach($partecipazioni as $partecipazione)
                                @if($pacchetto->IDPacchetto == $partecipazione->Pacchetto )
                                    <div class="catalogo-card" style="height: 500px">
                                        <h3>OFFERTA MULTIPLA!</h3>
                                        <h4>
                                            {{ $partecipazione->RagioneSociale }}
                                            @foreach($offerte as $offerta)
                                                @if($offerta->Pacchetto == $partecipazione->Pacchetto)
                                                    {{$offerta->RagioneSociale}}
                                                @endif
                                            @endforeach
                                        </h4>

                                        <h4 style="color: black"> Ottieni un ulteriore <b
                                                style="color: red">- {{$pacchetto->ScontoUlteriore }}</b>
                                            sulle offerte che compongono questo pacchetto.</h4>

                                        <h4>Offerte del pacchetto:</h4>
                                        <ul style="list-style-type: none; padding: 0; margin: 0; color: black">
                                            @php
                                                $counter = 0;
                                            @endphp
                                            {{$partecipazione->Titolo}}
                                            @foreach($offerte as $offerta)
                                                @if($offerta->Pacchetto == $partecipazione->Pacchetto)
                                                    <li>{{$offerta->Titolo}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <a href="{{route('offertaAbbinata', ['id'=> $pacchetto->IDPacchetto])}}">
                                            <button type="button" class="bottom-button">Scopri l'offerta!</button>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
            </div>

        </div>
        @else

            <div>
                <h1>Stai visualizzando il catalogo delle offerte multiple</h1>
                @foreach ($pacchetti as $pacchetto)

                    <div class="catalogo-card" style="height: 500px">
                        <h3>OFFERTA MULTIPLA!</h3>
                        <h4>
                            @foreach($partecipazioni as $partecipazione)
                                @if($partecipazione->Pacchetto == $pacchetto->IDPacchetto)
                                    {{ $partecipazione->RagioneSociale }}
                                @endif
                            @endforeach
                        </h4>

                        <h4 style="color: black"> Ottieni un ulteriore <b
                                style="color: red">- {{$pacchetto->ScontoUlteriore }}</b>
                            sulle offerte che compongono questo pacchetto.</h4>

                        <h4>Offerte del pacchetto:</h4>
                        <ul style="list-style-type: none; padding: 0; margin: 0; color: black">


                            @php
                                $counter = 0;
                            @endphp
                            @foreach($partecipazioni as $partecipazione)
                                @if($partecipazione->Pacchetto == $pacchetto->IDPacchetto)
                                    @if ($counter < 3)
                                        <li>{{ $partecipazione->Titolo }}</li>
                                        @php
                                            ++$counter;
                                        @endphp

                                    @elseif($counter == 3)
                                        <li>e altre ancora</li>
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        </ul>


                        <a href="{{route('offertaAbbinata', ['id'=> $pacchetto->IDPacchetto])}}">
                            {{--                    <a href="{{route('offerta', ['id'=> $offerta->IDOfferta])}}">--}}
                            <button type="button" class="bottom-button">Scopri l'offerta!</button>
                        </a>
                    </div>

                @endforeach
            </div>
    </div>
    @endif
    <div>
            @if ($pacchetti->hasPages())
                <div class="paginator-container">
                    @include('level3.paginator', ['paginator' => $pacchetti])
                </div>
            @endif
@endsection
