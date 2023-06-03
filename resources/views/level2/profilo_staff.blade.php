@extends("layouts.staff-layout")
@section("title", "Profilo Staff")
@section("content")
    <div class="my-container">
        <div class="wrapper-dashboard">
            <div id="profile-image-container">
                <div class="profile-img-cont">
                    <input id="file" type="file"/>
                    <label for="file">
                        <img id="profile-image" width="200px" height="200px"
                             src="{{asset("img/imgkri/download.jpg")}}">
                        <div class="edit-profile-cont">
                            <span class="edit-profile-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-camera-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                </svg>
                            </span>
                            <span class="edit-profile-text">Edit Profile</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="" style="text-align: center">
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
                        <div class="cell-1of2">
                            <div class="radio-container">
                                {{ Form::radio('genere', null, false, [ 'id'=>'male']) }}
                                {{ Form::label("male", "Male:")}}
                            </div>
                            <div class="radio-container">
                                {{ Form::radio('genere', null, true, [ 'id'=>'female']) }}
                                {{ Form::label("female", "Female:")}}
                            </div>
                        </div>
                        <div class="cell-1of2" id="btn-cont">
                            {{ Form::button('Submit', ['class' => 'btn-blue', 'type'=>'submit']) }}
                            {{ Form::button('Reset', ['class' => 'btn-light', 'type'=>'reset']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
