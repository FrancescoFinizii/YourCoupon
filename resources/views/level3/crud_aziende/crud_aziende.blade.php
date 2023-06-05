@extends('layouts.admin-layout')

@section('link')
    <link rel="stylesheet" href="{{asset ("css/christian/crud_stylesheet.css") }}">
@endsection

@section('title','CRUD AZIENDE')

@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h1> CRUD AZIENDE </h1>
                        <a href="{{ route('insertAzz') }}">
                            <img src="{{ asset('img/icon/create-button.png') }}" class="action-buttons-crud" alt="Insert Staff Button"/>
                        </a>
                    </div>
                    <div class="table-chri">
                        <table class>
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Ragione Sociale </th>
                                <th> Sede</th>
                                <th> Tipologia</th>
                                <th> Mail</th>
                                <th> Link</th>
                                <th> Actions</th>
                            </tr>
                            </thead>

                            @foreach ($aziende as $azienda)
                                <tbody>
                                <tr>
                                    <th> {{ $azienda->IDAzienda }} </th>
                                    <td>
                                        @include('helpers/AzImg', ['imgFile' => $azienda->Logo])
                                        {{ $azienda-> RagioneSociale }}
                                    </td>
                                    <td> {{ $azienda-> Sede }} </td>
                                    <td> {{ $azienda -> Tipologia }} </td>
                                    <td> {{ $azienda-> Mail }} </td>
                                    <td> {{ $azienda-> Link }} </td>
                                    <td>
                                        <a href="{{ route('modificaAzz', $azienda->IDAzienda) }}">
                                            <button class="edit-button">Modifica</button>
                                        </a>
                                        <a href="{{ route('eliminaAzz', $azienda->IDAzienda) }}" onclick="return confirm('Sei sicuro di voler eliminare questa azienda?')">
                                            <button class="delete-button"> Elimina </button>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        @if ($errors->has('error'))
                            <script>
                                alert('{{ $errors->first('error') }}');
                            </script>
                        @endif
                    </div>
                    <div class="table-footer">
                        @include('level3.paginator', ['paginator' => $aziende])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
