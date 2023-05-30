<link rel="stylesheet" href="{{ asset('css/christian/offerta.css') }}">

@extends('layouts.admin-layout')
@section('title','CRUD OFFERTE')
@section('content')
    <div class="background">
        <div class="large-table-off">
            <div class="table-wrap">
                <div class="table-title">
                    <h1> CRUD OFFERTE </h1>
                    <a href="{{ route('insertOff') }}">
                        <img src="{{ asset('img/icon/create-button.png') }}" class="action-buttons-crud" alt="Insert Offerta Button"/>
                    </a>
                </div>
                <div class="gallery">@foreach ($offerte as $offerta)
                        <div class="content">
                            @include('helpers/offImg', ['imgFile' => $offerta->FotoProd])
                            <h3> {{ $offerta-> Titolo }} </h3>
                            <div class="prezzo"> € {{ number_format($offerta-> Prezzo - ($offerta-> Prezzo * ($offerta-> Sconto/100)), 2, ',', '.') }} </div>
                            <h6 class="discount"> <span style="text-decoration: line-through;"> € {{ number_format($offerta-> Prezzo, 2, ',', '.') }} </span> &nbsp -{{ $offerta-> Sconto }}% </h6>
                            <p> {{ $offerta-> Descrizione }} </p>
                            <div class="footer-button">
                                <a class="edit-off-button" href="{{ route('modificaOff', $offerta->IDOfferta) }}">
                                    <span class="span"> Modifica </span>
                                </a>
                                <a class="delete-off-button" href="{{ route('eliminaOfferta', $offerta->IDOfferta) }}" onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">
                                    <span class="span"> Elimina </span>
                                </a>
                            </div>
                        </div>
                    @endforeach<!-- Contenuto delle offerte filtrate verrà caricato qui -->
                </div>
                <div class="paginazione">
                    @include('level3.paginator', ['paginator' => $offerte])
                </div>
            </div>
        </div>
    </div>

@endsection
