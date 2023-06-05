@extends("layouts.staff-layout")
@section("title", "Profilo Staff")
@section("content")
    <div class="wrapper-dashboard">
        <div class="cont-left">
            @include("component.profile-image")
            <h2 style="text-align: center">{{$utente->username}}</h2>
        </div>
        <div class="cont-right">
            {{ Form::open(['route' => ['staffUpdate', $utente->username], 'method' => 'PUT']) }}
            {{ Form::token() }}
            <div class="row-flex">
                <div class="cell1-2">
                    {{ Form::label("Nome", "Nome:")}}
                    {{ Form::text('Nome', $utente->Nome , [ 'id'=>'Nome', 'placeholder' => 'Nome']) }}
                    @if ($errors->first('Nome'))
                        @foreach ($errors->get('Nome') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="cell1-2">
                    {{ Form::label("Cognome", "Cognome:")}}
                    {{ Form::text('Cognome', $utente->Cognome, [ 'id'=>'Cognome', 'placeholder' => 'Cognome']) }}
                    @if ($errors->first('Cognome'))
                        @foreach ($errors->get('Cognome') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row-flex">
                <div class="cell1-2">
                    {{ Form::label("Email", "Email:")}}
                    {{ Form::text('Email', $utente->Email, [ 'id'=>'Email', 'placeholder' => 'Email']) }}
                    @if ($errors->first('Email'))
                        @foreach ($errors->get('Email') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="cell1-2">
                    {{ Form::label("Telefono", "Telefono:")}}
                    {{ Form::tel('Telefono', $utente->Telefono, [ 'id'=>'Telefono', 'placeholder' => 'Telefono']) }}
                    @if ($errors->first('Telefono'))
                        @foreach ($errors->get('Telefono') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row-flex">
                <div class="cell1-2">
                    {{ Form::label("Nascita", "Data di nascita:")}}
                    {{ Form::date('Nascita', $utente->Nascita, [ 'id'=>'Nascita', 'placeholder' => 'Data di nascita']) }}
                    @if ($errors->first('Nascita'))
                        @foreach ($errors->get('Nascita') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="cell1-2">
                    <div>
                    {{ Form::label("Genere", "Genere")}}
                    {{ Form::select('Genere', ['Uomo' => 'Uomo', 'Donna' => 'Donna', 'Altro' => 'Altro'], $utente->Genere, ['class' => 'select', 'id' => 'Genere']) }}
                        @if ($errors->first('Genere'))
                            @foreach ($errors->get('Genere') as $message)
                                <p class="errorLabel">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


            <div class="row-flex">
                <div class="cell1-2" id="info-btn-container">
                    {{ Form::button('Submit', ['class' => 'btn btn-blue', 'type'=>'submit']) }}
                    {{ Form::button('Reset', ['class' => 'btn btn-light', 'type'=>'reset']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
