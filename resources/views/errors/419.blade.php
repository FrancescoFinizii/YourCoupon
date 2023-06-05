@extends('layouts.catalogo_layout')
@section('title','Errore 419')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
@endsection

@section('catalogo-content')
    <div class="faq-crud-box">
        <div class="crudfaq-content-card">
            <div class="eseguita-div">
                <h1 class="div-heading-crudfaq">La tua sessione di login è scaduta.</h1>
                <p>Torna alla home o effettua nuovamente l'accesso al sito per riprendere a navigare nella tua area privata</p>
                <a href="{{ url('/') }}">
                    <button type="button" class="faq-button">Clicca per tornare alla home</button>
                </a>
            </div>
        </div>
    </div>

@endsection
