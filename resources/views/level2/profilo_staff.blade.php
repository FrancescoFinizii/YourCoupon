@extends("layouts.staff-layout")
@section("title", "Profilo Staff")
@section("content")
    <div class="wrapper-dashboard">
        <div class="cont-left">
            @include("component.profile-image")
        </div>
        <div class="cont-right">
            {{ Form::open(['route' => 'login', 'method' => 'post']) }}
            {{ Form::token() }}
            <div class="row-flex">
                <div class="cell1-2">
                    {{ Form::label("nome", "Nome:")}}
                    {{ Form::text('nome', null, [ 'id'=>'nome', 'placeholder' => 'Nome']) }}
                </div>
                <div class="cell1-2">
                    {{ Form::label("cognome", "Cognome:")}}
                    {{ Form::text('cognome', null, [ 'id'=>'cognome', 'placeholder' => 'Cognome']) }}
                </div>
            </div>
            <div class="row-flex">
                <div class="cell1-2">
                    {{ Form::label("email", "Email:")}}
                    {{ Form::text('email', null, [ 'id'=>'email', 'placeholder' => 'Email']) }}
                </div>
                <div class="cell1-2">
                    {{ Form::label("telefono", "Telefono:")}}
                    {{ Form::tel('telefono', null, [ 'id'=>'telefono', 'placeholder' => 'Telefono']) }}
                </div>
            </div>
            <div class="row-flex">
                <div class="cell1-2">
                    {{ Form::label("dataNascita", "Data di nascita:")}}
                    {{ Form::date('dataNascita', null, [ 'id'=>'dataNascita', 'placeholder' => 'Data di nascita']) }}
                </div>
                <div class="cell1-2">
                    {{ Form::label("username", "Username:")}}
                    {{ Form::text('username', null, [ 'id'=>'username', 'placeholder' => 'Username']) }}
                </div>
            </div>


            <div class="row-flex">
                <div class="cell1-2">
                    <div class="radio-container">
                        {{ Form::radio('genere', null, false, [ 'id'=>'uomo']) }}
                        {{ Form::label("uomo", "Uomo:")}}
                    </div>
                    <div class="radio-container">
                        {{ Form::radio('genere', null, true, [ 'id'=>'donna']) }}
                        {{ Form::label("donna", "Donna:")}}
                    </div>
                </div>
                <div class="cell1-2" id="info-btn-container">
                    {{ Form::button('Submit', ['class' => 'btn btn-blue', 'type'=>'submit']) }}
                    {{ Form::button('Reset', ['class' => 'btn btn-light', 'type'=>'reset']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
