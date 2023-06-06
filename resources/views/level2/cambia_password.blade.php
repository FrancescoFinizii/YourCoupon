@extends("layouts.staff-layout")
@section("title", "Staff Password")
@section("content")

    <div class="staff-dashboard" >
        <div class="" style="text-align: center">
            {{-- <form method="POST" action="{{route('cambia_password')}}">--}}
            {{ Form::open(['route' => ['staffPasswordUpdate', $utente -> username], 'class' => 'myform', 'method' => 'PUT']) }}
            {{ Form::token() }}
            <h2>Modifica la tua password:</h2>
            <p class="errorLabel">{{$error=null}}</p>
            <div class="">
                <div class="cell-pssw">
                    {{ Form::label("oldPassword", "Password:")}}
                    {{ Form::password('oldPassword', [ 'id'=>'oldPassword', 'placeholder' => 'Password']) }}

                </div>
                <div class="cell-pssw">
                    {{ Form::label("password", "Nuova Password:")}}
                    {{ Form::password('password', [ 'id'=>'password', 'placeholder' => 'New Password']) }}

                </div>
                <div class="cell-pssw">
                    {{ Form::label("password_confirmation", "Conferma Password:")}}
                    {{ Form::password('password_confirmation', [ 'id'=>'password_confirmation', 'placeholder' => 'Confirm New Password']) }}

                </div>
                <div class="cell-pssw" id="btn-cont">
                    {{ Form::button('Modifica', ['class' => 'btn btn-blue', 'type'=>'submit']) }}
                </div>
                <div class="cell-pssw" id="btn-cont">
                    {{ Form::button('Reset', ['class' => 'btn btn-light', 'type'=>'reset']) }}
                </div>

            </div>
            {{ Form::close() }}
        </div>

    </div>

@endsection
