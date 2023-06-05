@extends('layouts.catalogo_layout')
@section('title','Errore 403')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
@endsection

@section('catalogo-content')
    <div class="faq-crud-box">
        <div class="crudfaq-content-card">
            <div class="eseguita-div">
                <h1 class="div-heading-crudfaq">Potresti non avere i permessi per accedere a quest'area!</h1>
                <p>Contatta l'assistenza se il problema persiste.</p>
                <a href="{{ url('/') }}">
                    <button type="button" class="faq-button">Clicca per tornare alla home</button>
                </a>
            </div>
        </div>
    </div>

@endsection
