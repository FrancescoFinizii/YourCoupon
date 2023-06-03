@extends('layouts.admin-layout')
@section('link')
    <link rel="stylesheet" href="{{asset ("css/christian/crud_stylesheet.css") }}">
@endsection
@section('title','CRUD STAFF')
@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h1> GESTIONE UTENTI </h1>
                    </div>
                    <div class="table-chri">
                        <table class>
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Username</th>
                                <th> Nome</th>
                                <th> Cognome</th>
                                <th> Nascita</th>
                                <th> Telefono</th>
                                <th> E-mail</th>
                                <th> Action </th>
                            </tr>
                            </thead>

                            @foreach ($utenti as $utente)
                                    <tbody>
                                    <tr>
                                        <th> {{ $loop->iteration }} </th>
                                        <td>
                                            @include('helpers/proPic', ['imgFile' => $utente->ProPic])
                                            {{ $utente-> username }}
                                        </td>
                                        <td> {{ $utente-> Nome }} </td>
                                        <td> {{ $utente -> Cognome }} </td>
                                        <td> {{ $utente -> Nascita }} </td>
                                        <td> {{ $utente -> Telefono }} </td>
                                        <td> {{ $utente -> Email }} </td>
                                        <td>
                                            <a href="#">
                                                <button class="edit-button">Statistiche</button>
                                            </a>
                                            <a href="{{ route('eliminaUtente', $utente->username) }}" onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">
                                                <button class="delete-button"> Elimina </button>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="table-footer">
                        @include('level3.paginator', ['paginator' => $utenti])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
