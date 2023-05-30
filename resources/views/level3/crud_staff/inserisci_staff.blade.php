@extends('layouts.admin-layout')

@section('title', 'Inserisci Staff')
@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h2> Inserisci membro dello Staff </h2>
                    </div>
                    <div class="table-chri">
                        {{ Form::open(array('route' => 'insertStaffSave', 'files' => true)) }}
                        {{ Form::token() }}
                        <div class="row-chri">
                            <div class="cell-1of2">
                                {{ Form::label('Username', 'Inserisci lo Username') }}
                                {{ Form::text('Username', '', ['class' => 'form-control', 'id' => 'Username']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Password', 'Imposta la Password') }}
                                {{ Form::password('Password',  ['class' => 'form-control', 'id' => 'Password']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Nome', 'Inserisci il Nome') }}
                                {{ Form::text('Nome', '', ['class' => 'form-control', 'id' => 'Nome']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Cognome', 'Inserisci il Cognome') }}
                                {{ Form::text('Cognome', '', ['class' => 'form-control', 'id' => 'Cognome']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Email', 'Inserisci la E-mail') }}
                                {{ Form::email('Email', '', ['class' => 'form-control', 'id' => 'Email']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Nascita', 'Inserisci la data di nascita') }}
                                {{ Form::date('Nascita') }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Genere', 'Genere') }}
                                {{ Form::select('Genere', ['Uomo' => 'Uomo', 'Donna' => 'Donna', 'Altro' => 'Altro'], '', ['class' => 'form-control', 'id' => 'Genere']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Telefono', 'Inserisci il numero di Telefono') }}
                                {{ Form::text('Telefono', '', ['class' => 'form-control', 'id' => 'Telefono']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('ProPic', 'Inserisci la foto profilo') }}
                                {{ Form::file('ProPic', ['class' => 'form-control', 'id' => 'ProPic']) }}
                            </div>
                            {{ Form::submit('Aggiungi Staff', ['class' => 'btn']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
