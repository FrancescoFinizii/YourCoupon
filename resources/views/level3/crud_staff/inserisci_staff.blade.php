@extends('layouts.admin-layout')
@section('link')
    <link rel="stylesheet" href="{{asset ("css/christian/crud_stylesheet.css") }}">
@endsection
@section('title', 'Inserisci Staff')

@section('scripts')

    @parent

    <script src="{{asset('js/christian/chri.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {
            var actionUrl = "{{ route('insertStaffSave') }}";
            var formId = 'salvaStaff';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#salvaStaff").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });
    </script>

@endsection

@section('content')
    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h2> Inserisci membro dello Staff </h2>
                    </div>
                    <div class="table-chri">
                        {{ Form::open(array('route' => 'insertStaffSave', 'id' => 'salvaStaff', 'files' => true)) }}
                        {{ Form::token() }}
                        <div class="row-chri">
                            <div class="cell-1of2">
                                {{ Form::label('username', 'Inserisci lo Username') }}
                                {{ Form::text('username', '', ['class' => 'form-control', 'id' => 'username']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('password', 'Imposta la Password') }}
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
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
                            {{ Form::button('Torna Indietro', ['class' => 'btn btn-blue', 'onclick' => 'window.history.back()']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
