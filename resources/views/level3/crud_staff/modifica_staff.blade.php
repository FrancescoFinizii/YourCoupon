@extends('layouts.admin-layout')

@section('scripts')

    @parent

    <script src="{{asset('js/christian/chri.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {
            var actionUrl = "{{ route('salvaModificaStaff', [$utente->username]) }}";
            var formId = 'salvaModifica';
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

@section('title', 'Modifica Staff')
@section('content')

    <div class="background">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="table-title">
                        <h2> Modifica i dati di: {{$utente->username}} </h2>
                    </div>
                    <div class="table-chri">
                        {{ Form::open(array('route' => ['salvaModificaStaff', $utente->username], 'id' => 'salvaModifica', 'files' => true)) }}
                        {{ Form::token() }}

                        <div class="row-chri">
                            <div class="cell-1of2">
                                {{ Form::text('username', $utente->username, ['hidden'=> 'hidden', 'class' => 'form-control', 'id' => 'username']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('password', 'Nuova Password') }}
                                {{ Form::text('password', $utente->password, ['class' => 'form-control', 'id' => 'password']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Nome', 'Nome') }}
                                {{ Form::text('Nome', $utente->Nome, ['class' => 'form-control', 'id' => 'Nome']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Cognome', 'Cognome') }}
                                {{ Form::text('Cognome', $utente->Cognome, ['class' => 'form-control', 'id' => 'Cognome']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Email', 'Email') }}
                                {{ Form::email('Email', $utente->Email, ['class' => 'form-control', 'id' => 'Email']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Nascita', 'Data di nascita') }}
                                {{ Form::date('Nascita', $utente->Nascita) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Genere', 'Genere') }}
                                {{ Form::select('Genere', ['Uomo' => 'Uomo', 'Donna' => 'Donna', 'Altro' => 'Altro'], $utente->Genere, ['class' => 'form-control', 'id' => 'Genere']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('Telefono', 'Telefono') }}
                                {{ Form::text('Telefono', $utente->Telefono, ['class' => 'form-control', 'id' => 'Telefono']) }}
                            </div>
                            <div class="cell-1of2">
                                {{ Form::label('ProPic', 'Modifica la foto profilo') }}
                                {{ Form::file('ProPic', ['class' => 'form-control', 'id' => 'ProPic']) }}
                            </div>
                        </div>

                        {{ Form::submit('Salva Modifiche', ['class' => 'btn']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
