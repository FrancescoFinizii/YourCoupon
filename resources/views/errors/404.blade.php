@extends('layouts.catalogo_layout')
@section('title','Errore 404')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
@endsection

@section('catalogo-content')
    <div class="faq-crud-box">
        <div class="crudfaq-content-card">
            <div class="eseguita-div">
                <h1 class="div-heading-crudfaq">Non ho trovato la pagina che hai richiesto.</h1>
                <p>Torna alla home o riprendi a navigare attraverso la barra di navigazione.</p>
                <a href="{{ url('/') }}">
                    <button type="button" class="faq-button">Clicca per tornare alla home</button>
                </a>
            </div>
        </div>
    </div>

@endsection
