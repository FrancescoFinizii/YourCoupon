@extends('layouts.catalogo_layout')
@section('title', 'ERRORE!')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
@endsection

@section('catalogo-content')
    <div class="faq-crud-box">
        <div class="crudfaq-content-card">
            <div class="eseguita-div">
                @if(session('message'))
                    <h1 class="div-heading-crudfaq">{{ session('message') }}</h1>
                @else
                    <h1 class="div-heading-crudfaq"> Forse non dovresti essere qui? torna alla home e riprendi la navigazione nel sito</h1>
                @endif
                <p>Contatta l'assistenza se il problema persiste.</p>
                <a href="{{ url('/') }}">
                    <button type="button" class="faq-button">Clicca per tornare alla home</button>
                </a>
            </div>
        </div>
    </div>

@endsection
