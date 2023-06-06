@extends("layouts.user-layout")
@section("title", "User - Profile")
@section("content")
    <div class="schede" id="profile-div">
        <h1>Account settings</h1>
        {{ Form::open(array('route' => ['userProfileUpdate', $utente->username], "id" =>"profile-info-form", 'method' => 'PUT')) }}
        {{ Form::token() }}
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("Nome", "Name:") }}
                {{ Form::text('Nome', $utente->Nome, [ 'id'=>'Nome', "placeholder" => "Name"]) }}

            </div>
            <div class="cell-1of2">
                {{ Form::label("Cognome", "Surname:") }}
                {{ Form::text('Cognome', $utente->Cognome, [ 'id'=>'Cognome', "placeholder" => "Surname"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("Email", "Email:") }}
                {{ Form::email('Email', $utente->Email, [ 'id'=>'Email', "placeholder" => "Email"]) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label("Telefono", "Phone number:") }}
                {{ Form::tel('Telefono', $utente->Telefono, ['id'=>'Telefono', "placeholder" => "Phone"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label("Nascita", "Date of birth:") }}
                {{ Form::date('Nascita', $utente->Nascita, [ 'id'=>'Nascita', "placeholder" => "Phone"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                <div class="radio-container">
                    {{ Form::radio('genere', "Uomo" , False, ["id" => "Uomo"]) }}
                    {{ Form::label("male", "Uomo") }}
                </div>
                <div class="radio-container">
                    {{ Form::radio('genere', "Donna", True, ["id" => "Donna"]) }}
                    {{ Form::label("female", "Donna") }}
                </div>
            </div>
            <div class="cell-1of2" id="info-btn-container">
                {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
                {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
