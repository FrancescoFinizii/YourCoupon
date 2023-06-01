@extends('layouts.admin-layout')

@section('scripts')

    @parent

    <script src="{{asset('js/christian/chri.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {
            var actionUrl = "{{ route('salvaModificaOff', [$offerta->IDOfferta]) }}";
            var formId = 'salvaModificaOff';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#salvaModificaOff").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });
    </script>

@endsection

@section('title', 'Modifica Offerta')
@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h2> Modifica i dati dell'offerta: {{ $offerta -> Titolo }} </h2>
                    </div>
                    <div class="table-chri">
                        {{ Form::open(array('route' => ['salvaModificaOff', $offerta -> IDOfferta], 'id' => 'salvaModificaOff', 'files' => true)) }}
                        {{ Form::token() }}
                        <div class="row-chri">
                            {{ Form::text('IDOfferta', $offerta -> IDOfferta, ['hidden'=> 'hidden', 'id' => 'IDOfferta']) }}
                            <div class="cell-1of2">
                                {{ Form::label('Titolo', 'Inserisci il titolo dell\'offerta') }}
                                {{ Form::text('Titolo', $offerta -> Titolo, ['class' => 'form-control', 'id' => 'Titolo']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Prezzo', 'Inserisci il prezzo') }}
                                {{ Form::text('Prezzo', $offerta -> Prezzo, ['class' => 'form-control', 'id' => 'Prezzo']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Sconto', 'Inserisci lo sconto') }}
                                {{ Form::text('Sconto', $offerta -> Sconto, ['class' => 'form-control', 'id' => 'Sconto']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Azienda', 'Inserisci l\'ID dell\'azienda a cui l\'offerta è riferita') }}
                                {{ Form::select('Azienda', $aziende, $offerta->Azienda, ['class' => 'form-control', 'id' => 'Azienda']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Inizio', 'Inserisci la data di inizio dell\'offerta') }}
                                {{ Form::date('Inizio', $offerta -> Inizio) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Scadenza', 'Inserisci la data di scadenza dell\'offerta') }}
                                {{ Form::date('Scadenza', $offerta -> Scadenza) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Fruizione', 'Imposta il luogo di fruizione dell\'offerta') }}
                                {{ Form::select('Fruizione', ['In negozio' => 'In negozio', 'Online' => 'Online', 'In negozio e online' => 'In negozio e online'], $offerta -> Fruizione, ['class' => 'form-control', 'id' => 'Fruizione']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Descrizione', 'Inserisci la descrizione dell\'offerta') }}
                                {{ Form::text('Descrizione', $offerta -> Descrizione, ['class' => 'form-control', 'id' => 'Descrizione']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('FotoProd', 'Inserisci la foto del prodotto') }}
                                {{ Form::file('FotoProd', ['class' => 'form-control', 'id' => 'FotoProd']) }}
                            </div>
                            {{ Form::submit('Salva Modifiche', ['class' => 'btn']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
