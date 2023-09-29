@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Password")
@section("content")
    <div class="schede">
        <h1>Password settings</h1>
        {{ Form::open(['route' => 'cliente.update.password', 'method' => 'PUT']) }}
        {{ Form::token() }}
        <div class="row-flex">
            <div class="cell-1of2">
                {{Form::label("oldPassword", "Vecchia password:")}}
                {{ Form::password('oldPassword', ["class" => "input", "placeholder" => "Vecchia password"]) }}
            </div>
            <div class="cell-1of2"></div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{Form::label("password", "Nuova Password:")}}
                {{ Form::password('password', ["class" => "input", "placeholder" => "Nuova Password"]) }}
            </div>
            <div class="cell-1of2">
                {{Form::label("password_confirmation", "Conferma password:")}}
                {{ Form::password('password_confirmation', ["class" => "input", "placeholder" => "Conferma password"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2"></div>
            <div class="cell-1of2" id="password-btn-container">
                {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
                {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
