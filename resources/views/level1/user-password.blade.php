@extends("layouts.user-layout")
@section("title", "User - Password")
@section("content")
    <div class="schede" id="password-div">
        <h1>Imposta una nuova password</h1>

        {{ Form::open(['id' => 'password-info-form']) }}
        <div class="row-flex">
            <div class="cell-1of2" id="old-password-container">
                {{ Form::label('vecchia-password', 'Vecchia password:') }}
                {{ Form::password('vecchia-password', ['placeholder' => 'Vecchia password', 'required']) }}
            </div>
            <div class="cell-1of2"></div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label('nuova-password', 'Nuova password:') }}
                {{ Form::password('nuova-password', /*['placeholder' => 'Nuova password', 'required']*/) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label('conferma-nuova-password', 'Conferma nuova password:') }}
                {{ Form::password('conferma-nuova-password',/* ['placeholder' => 'Confirm new password']*/) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2"></div>
            <div class="cell-1of2" id="password-btn-container">
                {{ Form::submit('Conferma modifiche', ['class' => 'btn btn-blue']) }}
                {{ Form::reset('Cancella', ['class' => 'btn btn-light']) }}
            </div>
        </div>
        {{ Form::close() }}









        {{--<form id="password-info-form">
            <div class="row-flex">
                <div class="cell-1of2" id="old-password-container">
                    <label>Old password:</label>
                    <input type="password" id="old-password" placeholder="Old password" required maxlength="15">
                </div>
                <div class="cell-1of2">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>New password:</label>
                    <input type="password" id="new-password" placeholder="New password" required maxlength="15">
                </div>
                <div class="cell-1of2">
                    <label>Confirm new password:</label>
                    <input type="password" id="confirm-new-password" placeholder="New password" required maxlength="15">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2"></div>
                <div class="cell-1of2" id="password-btn-container">
                    <button class="btn btn-blue" type="submit">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                </div>
            </div>
        </form>--}}
    </div>
@endsection
