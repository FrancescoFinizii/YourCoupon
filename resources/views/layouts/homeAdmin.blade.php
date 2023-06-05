@extends('layouts.admin-layout')
@section('title','Home Admin')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
@endsection
@section('content')

    <div class="adminHome">
        <h1>Benvenuto Admin!</h1>
        <p>Scegli cosa fare tramite la barra in alto.</p>
    </div>

        {{--
    @if(auth()->user()->hasRole('3'))
            <h1>Benvenuto Admin!</h1>
    @elseif(auth()->user()->hasRole('2'))
            <h1>Benvenuto Staff!</h1>
    @elseif(auth()->user()->hasRole('1'))
            <h1>Benvenuto Utente!</h1>
    @endif
        <p>Scegli cosa fare tramite la barra in alto.</p>
    </div>
    --}}
@endsection

