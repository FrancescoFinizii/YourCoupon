@extends("public.layout.public-layout")
@section("title", "Sign up")
@section("content")
    <div class="background" style="background-image:url({{url('img/background.jpg')}});">
        <div class="card">
            <div class="icon-container flex-centered">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor"
                     viewBox="0 0 16 16"
                     class="bi bi-person">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                </svg>
            </div>
            {{ Form::open(['route' => 'register', "method" => "POST",  "enctype" => "multipart/form-data"]) }}
            {{ Form::text('nome', '', ["class" => "input", 'placeholder'=>'Nome']) }}
            @if ($errors->has('nome'))
                @foreach ($errors->get('nome') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::text('cognome', '', ["class" => "input", 'placeholder'=>'Cognome']) }}
            @if ($errors->has('cognome'))
                @foreach ($errors->get('cognome') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::text('username', '', ["class" => "input", 'placeholder'=>'Username']) }}
            @if ($errors->has('username'))
                @foreach ($errors->get('username') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::Email('email', '', ["class" => "input", 'placeholder'=>'Email']) }}
            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::text('dataNascita', null, ["class" => "input", "onfocus" => "(this.type='date')", "onblur" => "(this.type='text')", 'placeholder'=>'Data di nascita']) }}
            @if ($errors->has('dataNascita'))
                @foreach ($errors->get('dataNascita') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::text('telefono', '', ["class" => "input", 'placeholder'=>'Telefono']) }}
            @if ($errors->has('telefono'))
                @foreach ($errors->get('telefono') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::select('genere', ["Non specificato" => "Non specificato", 'Uomo' => 'Uomo', 'donna' => 'donna'], null, []) }}
            @if ($errors->has('genere'))
                @foreach ($errors->get('genere') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::password('password', ["class" => "input", 'placeholder'=>'Password']) }}
            @if ($errors->has('password'))
                @foreach ($errors->get('password') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::password('password_confirmation', ["class" => "input", 'placeholder'=>'Conferma password']) }}
            @if ($errors->has('password_confirmation'))
                @foreach ($errors->get('password_confirmation') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::file("foto", ["accept" => ".jpg, .jpeg, .png", 'class' => 'input' ]) }}
            @if ($errors->has('foto'))
                @foreach ($errors->get('foto') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::button('Registrati', ['class' => 'btn btn-blue btn-large', "type" =>"submit"]) }}
            {{ Form::close() }}
            <p>Hai già un account? <a class="std-link" href="{{route('login')}}">Accedi</a>!</p>
        </div>
    </div>
@endsection
