@extends('layouts.admin-layout')

@section('link')
    <link rel="stylesheet" href="{{asset ("css/christian/crud_stylesheet.css") }}">
@endsection

@section('scripts')
    @parent

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/christian/chri.js')}}"></script>

    <script>
        $(function () {
            var actionUrl = "{{ route('salvaModificaAzz', [$azienda->IDAzienda]) }}";
            var formId = 'salvaModificaAzz';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#salvaModificaAzz").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });
    </script>

@endsection

@section('title', 'Modifica Azienda')
@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h2> Modifica i dati dell'offerta: {{ $azienda -> RagioneSociale }} </h2>
                    </div>
                    <div class="table-chri">
                        {{ Form::open(array('route' => ['salvaModificaAzz', $azienda -> IDAzienda], 'id' => 'salvaModificaAzz', 'files' => true)) }}
                        {{ Form::token() }}
                        <div class="row-chri">
                            {{ Form::text('IDAzienda', $azienda -> IDAzienda, ['hidden'=> 'hidden', 'id' => 'IDAzienda']) }}
                            <div class="cell-1of2">
                                {{ Form::label('RagioneSociale', 'Inserisci la ragione sociale dell\'azienda') }}
                                {{ Form::text('RagioneSociale', $azienda -> RagioneSociale, ['class' => 'form-control', 'id' => 'RagioneSociale']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Sede', 'Inserisci la Sede') }}
                                {{ Form::text('Sede', $azienda -> Sede, ['class' => 'form-control', 'id' => 'Sede']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Tipologia', 'Inserisci la Tipologia') }}
                                {{ Form::text('Tipologia', $azienda -> Tipologia, ['class' => 'form-control', 'id' => 'Tipologia']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Descrizione', 'Inserisci la descrizione dell\'azienda') }}
                                {{ Form::text('Descrizione', $azienda->Descrizione, ['class' => 'form-control', 'id' => 'Descrizione']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Mail', 'Inserisci la Mail') }}
                                {{ Form::text('Mail', $azienda -> Mail, ['class' => 'form-control', 'id' => 'Mail']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Link', 'Inserisci il link al sito dell\'azienda') }}
                                {{ Form::text('Link', $azienda -> Link, ['class' => 'form-control', 'id' => 'Link']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Telefono', 'Inserisci il numero di telefono dell\'azienda') }}
                                {{ Form::text('Telefono', $azienda -> Telefono, ['class' => 'form-control', 'id' => 'Telefono']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Logo', 'Inserisci il logo dell\'azienda') }}
                                {{ Form::file('Logo', ['class' => 'form-control', 'id' => 'Logo']) }}
                            </div>
                            {{ Form::submit('Salva Modifiche', ['class' => 'btn btn-blue']) }}
                            {{ Form::reset('Annulla Modifiche', ['class' => 'btn']) }}
                            {{ Form::button('Torna Indietro', ['class' => 'btn btn-blue', 'onclick' => 'window.history.back()']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
