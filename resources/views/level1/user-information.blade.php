@extends("layouts.user-layout")
@section("title", "User - Profile")
@section('link')

    <link rel="stylesheet" href="{{asset ("css/ludovico/faq.css") }}">

@endsection
@section("content")
    <div class="schede" id="profile-div">
        <h1>Account settings</h1>
        {{ Form::open(['id' => 'profile-info-form']) }}

        {{ Form::token() }}

        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label('nome', 'Nome:') }}
                {{ Form::text('nome' , Auth::user()->Nome, ['placeholder' => 'Nome', 'disabled']) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label('cognome', 'Cognome:') }}
                {{ Form::text('cognome', Auth::user()->Cognome, ['placeholder' => 'Cognome']) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', Auth::user()->Email, ['class' => 'form-control', 'placeholder' => 'Email', 'pattern' => '^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$']) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label('telefono', 'Phone number:') }}
                {{ Form::tel('telefono', Auth::user()->Telefono, ['class' => 'form-control', 'placeholder' => 'Telefono', 'pattern' => '[0-9]{10}']) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{ Form::label('dataNascita', 'Date of birth:') }}
                {{ Form::date('dataNascita', Auth::user()->Nascita, ['class' => 'form-control', 'placeholder' => 'Data di nascita']) }}
            </div>
            <div class="cell-1of2">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', Auth::user()->username, ['class' => 'form-control', 'placeholder' => 'Username']) }}
            </div>
        </div>
        <div class="row-flex">
            <div class="cell-1of2">
                {{--<div class="radio-container">
                    {{ Form::radio('genere', 'male', false, ['id' => 'male']) }}
                    {{ Form::label('male', 'Male') }}
                </div>
                <div class="radio-container">
                    {{ Form::radio('genere', 'female', false, ['id' => 'female']) }}
                    {{ Form::label('female', 'Female') }}
                </div>--}}

                <div class="radio-container">
                    {{ Form::radio('genere', 'maschio', Auth::user()->Genere == 'Uomo', ['id' => 'Uomo']) }}
                    <label for="maschio">Maschio</label>
                </div>
                <div class="radio-container">
                    {{ Form::radio('genere', 'femmina', Auth::user()->Genere == 'Donna', ['id' => 'Donna']) }}
                    <label for="femmina">Femmina</label>
                </div>

            </div>
            <div class="cell-1of2" id="info-btn-container">
                {{ Form::submit('Submit', ['class' => 'btn btn-blue']) }}
                {{ Form::reset('Reset', ['class' => 'btn btn-light']) }}
            </div>
        </div>
        {{ Form::close() }}



        {{--<form id="profile-info-form">
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>Name:</label>
                    <input type="text" id="nome" placeholder="Name" required maxlength="15">
                </div>
                <div class="cell-1of2">
                    <label>Surname:</label>
                    <input type="text" id="cognome" placeholder="Surname" required maxlength="15">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>Email:</label>
                    <input class="form-control" type="email" id="email" placeholder="Email" maxlength="30"
                           required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                </div>
                <div class="cell-1of2">
                    <label>Phone number:</label>
                    <input class="form-control" type="tel" id="telefono" placeholder="Phone" maxlength="13"
                           required pattern="[0-9]{10}">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>Date of birth:</label>
                    <input class="form-control" id="dataNascita" placeholder="Data di nascita" type="date"
                           required>
                </div>
                <div class="cell-1of2">
                    <label>Username:</label>
                    <input class="form-control" type="text" id="username" placeholder="Username"
                           maxlength="10" required>
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <div class="radio-container">
                        <input type="radio" id="male" name="genere">
                        <label for="male">Male</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" id="female" name="genere">
                        <label for="female">Female</label>
                    </div>
                </div>
                <div class="cell-1of2" id="info-btn-container">
                    <button class="btn btn-blue" type="submit">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                </div>
            </div>
        </form>--}}
    </div>
@endsection
