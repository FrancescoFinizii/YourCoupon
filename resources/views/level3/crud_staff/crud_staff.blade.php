@extends('layouts.admin-layout')
@section('title','CRUD STAFF')
@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h1> CRUD STAFF </h1>
                        <a href="{{ route('insertStaff') }}">
                            <img src="{{ asset('img/icon/create-button.png') }}" class="action-buttons-crud" alt="Insert Staff Button"/>
                        </a>
                    </div>
                    <div class="table-chri">
                        <table class>
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Staff Username</th>
                                <th> Nome</th>
                                <th> Cognome</th>
                                <th> Telefono</th>
                                <th> Email</th>
                                <th> Actions</th>
                            </tr>
                            </thead>

                            @foreach ($staff as $utente)
                                @if($utente->Livello === 2)
                                    <tbody>
                                    <tr>
                                        <th> {{ $loop->iteration }} </th>
                                        <td>
                                            @include('helpers/proPic', ['imgFile' => $utente->ProPic])
                                            {{ $utente-> Username }}
                                        </td>
                                        <td> {{ $utente-> Nome }} </td>
                                        <td> {{ $utente -> Cognome }} </td>
                                        <td> {{ $utente-> Telefono }} </td>
                                        <td> {{ $utente-> Email }} </td>
                                        <td>
                                            <a href="{{ route('salvaModificaStaff', [$utente->Username]) }}">
                                                <button class="edit-button">Modifica</button>
                                            </a>
                                            <a href="{{ route('eliminaStaff', $utente->Username) }}" onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">
                                                <button class="delete-button"> Elimina </button>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endif
                            @endforeach

                        </table>
                    </div>
                    <div class="table-footer">
                        @include('level3.paginator', ['paginator' => $staff])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
