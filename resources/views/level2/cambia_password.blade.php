@extends("layouts.staff-layout")
@section("title", "Staff Password")
@section("content")

    <div class="staff-dashboard" >
        <div class="" style="text-align: center">
            {{-- <form method="POST" action="{{route('cambia_password')}}">--}}
            {{ Form::open(['route' => 'login', 'class' => 'myform', 'method' => 'post']) }}
            {{ Form::token() }}
            <h2>Modifica la tua password:</h2>
            <p class="errorLabel">{{$error=null}}</p>
            <div class="">
                <div class="cell-pssw">
                    {{ Form::label("old_password", "Password:")}}
                    {{ Form::password('old_password', [ 'id'=>'old_password', 'placeholder' => 'Password']) }}
                    @if ($errors->first('old_password'))
                        @foreach ($errors->get('old_password') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="cell-pssw">
                    {{ Form::label("new_password", "Nuova Password:")}}
                    {{ Form::password('new_password', [ 'id'=>'new_password', 'placeholder' => 'New Password']) }}
                    @if ($errors->first('new_password'))
                        @foreach ($errors->get('new_password') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="cell-pssw">
                    {{ Form::label("confirm_password", "Conferma Password:")}}
                    {{ Form::password('confirm_password', [ 'id'=>'confirm_password', 'placeholder' => 'Confirm New Password']) }}
                    @if ($errors->first('confirm_password'))
                        @foreach ($errors->get('confirm_password') as $message)
                            <p class="errorLabel">{{ $message }}</p>
                        @endforeach
                    @endif
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
