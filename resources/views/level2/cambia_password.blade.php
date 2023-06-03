@extends("layouts.staff-layout")
@section("title", "Staff Password")
@section("content")
    <div class="my-container" style="text-align: center">
        <div class="wrapper-dashboard" style="max-width: 600px; margin: 0 auto;">
            <div class="" style="text-align: center">
                <img id="profile-image" width="200px" height="200px " src="{{asset("img/imgkri/download.jpg")}}">
{{--                <form method="POST" action="{{route('cambia_password')}}">--}}
                    {{ Form::open(['route' => 'login', 'class' => 'myform', 'method' => 'post']) }}
                    {{ Form::token() }}
                    <h4>Change Your Password</h4>
                <p class="errorLabel">{{$error=null}}</p>
                    <div class="">
                        <div class="cell-pssw">
                            {{ Form::label("old_password", "Password:")}}
                            {{ Form::password('old_password', [ 'id'=>'old_password', 'placeholder' => 'Password']) }}
                        </div>
                        <div class="cell-pssw">
                            {{ Form::label("new_password", "Nuova Password:")}}
                            {{ Form::password('new_password', [ 'id'=>'new_password', 'placeholder' => 'New Password']) }}
                        </div>
                        <div class="cell-pssw">
                            {{ Form::label("confirm_password", "Conferma Password:")}}
                            {{ Form::password('confirm_password', [ 'id'=>'confirm_password', 'placeholder' => 'Confirm New Password']) }}
                        </div>
                        <div class="cell-pssw" id="btn-cont">
                            {{ Form::button('Change Password', ['class' => 'btn btn-blue', 'type'=>'submit']) }}
                            {{ Form::button('Reset', ['class' => 'btn btn-light', 'type'=>'reset']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>

        </div>
    </div>
@endsection
