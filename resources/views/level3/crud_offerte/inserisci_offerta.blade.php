@extends('level3.admin')

@section('title', 'Inserisci Offerta')
@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h2> Inserisci Nuova Offerta </h2>
                    </div>
                    <div class="table-chri">
                        {{ Form::open(array('route' => 'insertOffSave', 'files' => true)) }}
                        {{ Form::token() }}
                        <div class="row-chri">
                            <div class="cell-1of2">
                                {{ Form::label('Titolo', 'Inserisci il titolo dell\'offerta') }}
                                {{ Form::text('Titolo', '', ['class' => 'form-control', 'id' => 'Titolo']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Prezzo', 'Inserisci il prezzo') }}
                                {{ Form::text('Prezzo', '', ['class' => 'form-control', 'id' => 'Prezzo']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Sconto', 'Inserisci lo sconto') }}
                                {{ Form::text('Sconto', '', ['class' => 'form-control', 'id' => 'Sconto']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Azienda', 'Inserisci l\'ID dell\'azienda a cui l\'offerta è riferita') }}
                                {{ Form::select('Azienda', $aziende, '', ['class' => 'form-control', 'id' => 'Azienda']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Inizio', 'Inserisci la data di inizio dell\'offerta') }}
                                {{ Form::date('Inizio') }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Scadenza', 'Inserisci la data di scadenza dell\'offerta') }}
                                {{ Form::date('Scadenza') }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Fruizione', 'Imposta il luogo di fruizione dell\'offerta') }}
                                {{ Form::select('Fruizione', ['N' => 'In negozio', 'O' => 'Online', 'N-O' => 'In negozio e online'], '', ['class' => 'form-control', 'id' => 'Fruizione']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Descrizione', 'Inserisci la descrizione dell\'offerta') }}
                                {{ Form::text('Descrizione', '', ['class' => 'form-control', 'id' => 'Descrizione']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('FotoProd', 'Inserisci la foto del prodotto') }}
                                {{ Form::file('FotoProd', ['class' => 'form-control', 'id' => 'FotoProd']) }}
                            </div>
                            {{ Form::submit('Aggiungi Offerta', ['class' => 'btn']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
