@extends("layouts.user-layout")
@section("title", "User - Password")
@section("content")
    <div class="schede" id="password-div">
        <h1>Password settings</h1>
        {{ Form::open(['route' => ['passwordUpdate', $utente->username],"id" =>"password-info-form", 'method' => 'PUT']) }}
        {{ Form::token() }}
        <div class="row-flex">
            <div class="cell-1of2" id="old-password-container">
                {{Form::label("oldPassword", "Old password:")}}
                {{ Form::password('oldPassword', [ 'id'=>'oldPassword', "placeholder" => "Old password"]) }}
            </div>
            <div class="cell-1of2">
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{Form::label("password", "Password:")}}
                {{ Form::password('password', [ 'id'=>'password', "placeholder" => "Password"]) }}
            </div>
            <div class="cell-1of2">
                {{Form::label("password_confirmation", "Confirm password:")}}
                {{ Form::password('password_confirmation', [ 'id'=>'password_confirmation', "placeholder" => "Confirm password"]) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2"></div>
            <div class="cell-1of2" id="password-btn-container">
                {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
                {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
