
@extends('layouts.public-layout')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/christian/azz.css') }}">
    <link rel="stylesheet" href="{{ asset('css/christian/crud_stylesheet.css') }}">
@endsection

@section('title', 'Info Azienda')

@section('content')
    <div class="container">
        <div class="offerta">
            <div class="offerta-informazioni">
                <div class="div-image-offerta">
                    @include('helpers/AzImg', ['imgFile' => $azienda->Logo])
                </div>
                <div class="azienda">
                    <h1 style="font-size: 50px">{{$azienda->RagioneSociale}}</h1>
                    <p style="font-size: 25px"> Tipologia: {{$azienda->Tipologia}}</p>
                    <p style="font-size: 25px">Sede: {{$azienda->Sede}}</p>
                    <a href="http://{{$azienda->Link}}" style="text-decoration: none; text-transform: uppercase" class="btn-pagina-offerta btn-offerta-coupon">
                        LINK AL SITO DI {{$azienda->RagioneSociale}}
                    </a>
                </div>
            </div>

            <div class="info-offerta">
                <div class="info-offerta-div">
                    <h3>Descrizione:</h3>
                    <p>
                        {{$azienda->Descrizione}}
                    </p>
                    <h3>Dati di {{$azienda->RagioneSociale}}:</h3>
                    <p>
                        Telefono: {{$azienda->Telefono}};
                    </p>
                    <p>
                        <a href="mailto:{{$azienda->Mail}}" style="text-decoration: none; color: black">
                            E-mail: {{$azienda->Mail}};
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
