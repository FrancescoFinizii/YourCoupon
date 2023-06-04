@extends("layouts.public-layout")
@section("title", "Registration")
@section("content")

    <div class="my-container" style="background-image:url({{url('img/background.jpg')}});">
        <div class="card">
            <div class="icon-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor"
                     viewBox="0 0 16 16"
                     class="bi bi-person">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                </svg>
            </div>
            {{ Form::open(['route' => 'register', 'class' => 'myform']) }}
            {{ Form::token() }}
            {{ Form::text('Nome', '', ['id' => 'Nome', 'placeholder'=>'Nome']) }}
            @if ($errors->first('Nome'))
                @foreach ($errors->get('Nome') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::text('Cognome', '', ['id' => 'Nome', 'placeholder'=>'Cognome']) }}
            @if ($errors->first('Cognome'))
                @foreach ($errors->get('Cognome') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::text('username', '', ['id' => 'username', 'placeholder'=>'Username']) }}
            @if ($errors->first('username'))
                @foreach ($errors->get('username') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::Email('Email', '', ['id' => 'Email', 'placeholder'=>'Email']) }}
            @if ($errors->first('Email'))
                @foreach ($errors->get('Email') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::text('Nascita', null, ['id' => 'Nascita', "onfocus" => "(this.type='date')", "onblur" => "(this.type='text')", 'placeholder'=>'Data di nascita']) }}
            @if ($errors->first('Nascita'))
                @foreach ($errors->get('Nascita') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::text('Telefono', '', ['id' => 'Telefono', 'placeholder'=>'Telefono']) }}
            @if ($errors->first('Telefono'))
                @foreach ($errors->get('Telefono') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::password('password', [ 'placeholder' => 'Password', 'id'=>'password']) }}
            @if ($errors->first('password'))
                @foreach ($errors->get('password') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'placeholder'=>'Conferma password']) }}
            @if ($errors->first('password_confirmation'))
                @foreach ($errors->get('password_confirmation') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            <div class="radio-container">
                {{ Form::radio('Genere', 'Uomo')}}
                {{ Form::label('Genere', 'Uomo')}}
            </div>
            <div class="radio-container">
                {{ Form::radio('Genere', 'Donna')}}
                {{ Form::label('Genere', 'Donna')}}
            </div>
            @if ($errors->first('Genere'))
                @foreach ($errors->get('Genere') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif
            {{ Form::button('Registrati', ['class' => 'btn btn-blue btn-large', "type" =>"submit"]) }}
            {{ Form::close() }}
            <p>Hai già un account? <a class="std-link" href="{{route('login')}}">Accedi</a>!</p>
        </div>
    </div>
@endsection
