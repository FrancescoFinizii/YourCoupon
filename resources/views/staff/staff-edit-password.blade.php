@extends("staff.layout.staff-layout")
@section("title", "Staff - Password")
@section("content")
    <div class="form-container">
        <div class="form-heading">
            <h1>Modifica Password</h1>
        </div>
        {{Form::open(["route" => "staff.update.password", "method" => "PUT"])}}
        <div class="form-input">
            <div class="input-item">
                {{Form::label("oldPassword", "Vecchia password:")}}
                {{ Form::password('oldPassword', [ 'id'=>'oldPassword', "class" => "input", "placeholder" => "Vecchia password"]) }}
            </div>
            <div class="input-item">
            </div>
            <div class="input-item">
                {{Form::label("password", "Nuova Password:")}}
                {{ Form::password('password', [ 'id'=>'password', "class" => "input", "placeholder" => "Nuova Password"]) }}
            </div>
            <div class="input-item">
                {{Form::label("password_confirmation", "Conferma password:")}}
                {{ Form::password('password_confirmation', [ 'id'=>'password_confirmation', "class" => "input", "placeholder" => "Conferma password"]) }}
            </div>
        </div>
        <div class="form-button">
            {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
        </div>
        {{Form::close()}}
    </div>
@endsection
