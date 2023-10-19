@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Profilo")
@section("content")
    <div class="schede">
        <h1>Account settings</h1>
        {{ Form::open(['route' => 'cliente.update.profile', 'method' => 'PUT']) }}
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("nome", "Nome:") }}
                {{ Form::text('nome', Auth::user()->utenteable->nome, ["class" => "input", "placeholder" => "Nome"]) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label("cognome", "Cognome:") }}
                {{ Form::text('cognome', Auth::user()->utenteable->cognome, ["class" => "input", "placeholder" => "Cognome"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("username", "Username:") }}
                {{ Form::text('username', Auth::user()->username, ["class" => "input", "placeholder" => "Username"]) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label("email", "Email:") }}
                {{ Form::email('email', Auth::user()->utenteable->email, ["class" => "input", "placeholder" => "Email"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("dataNascita", "Data di Nascita: ") }}
                {{ Form::text('dataNascita', Auth::user()->utenteable->dataNascita, ["class" => "input", "placeholder" => "Data di Nascita", "onfocus" => "(this.type='date')", "onblur" => "(this.type='text')"]) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label("telefono", "Telefono:") }}
                <div class="phone-input">
                    {{ Form::tel('telefono', Auth::user()->utenteable->telefono, ["class" => "input", "placeholder" => "Telefono"]) }}
                    <span class="prefix">
                    <img src="{{asset("img/italy.png")}}" width="20" height="15">
                    +39
                </span>
                </div>
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("genere", "Genere")}}
                {{ Form::select('genere', ["Non specificato" => "Non specificato", 'Uomo' => 'Uomo', 'donna' => 'donna'], Auth::user()->utenteable->genere, []) }}
            </div>
            <div class="cell-1of2" id="profile-btn-container">
                {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
                {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
