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
            {{--            <label class="errorLabel">Error Label</label>--}}
            {{ Form::open(['route' => 'register', 'class' => 'myform']) }}
            {{ Form::token() }}

            {{--            <form class="myform" method="post">--}}

            {{ Form::text('Nome', '', ['id' => 'Nome', 'placeholder'=>'Nome']) }}
            {{--                <input type="text" id="nome" placeholder="Name" required maxlength="15">--}}
            {{ Form::text('Cognome', '', ['id' => 'Nome', 'placeholder'=>'Cognome']) }}
            {{--                <input type="text" id="cognome" placeholder="Surname" required maxlength="15">--}}

            {{ Form::text('username', '', ['id' => 'username', 'placeholder'=>'Username']) }}
            {{--            <input type="text" id="username" placeholder="Username" maxlength="10" required>--}}

            {{ Form::Email('Email', '', ['id' => 'Email', 'placeholder'=>'Email']) }}
            {{--                <input type="email" id="email" placeholder="Email" maxlength="30" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">--}}


            {{ Form::input('date', 'Nascita', null, ['id' => 'Nascita']) }}

            {{--            <input type="text" id="dataNascita" placeholder="Date of birth" onfocus="(this.type='date')" onblur="(this.type='text')" required>--}}


            {{ Form::text('Telefono', '', ['id' => 'Telefono', 'placeholder'=>'Telefono']) }}
            {{--            <input type="tel" id="telefono" placeholder="Phone" maxlength="13" required pattern="[0-9]{10}">--}}

            <div class="radio-container">
                {{ Form::radio('Genere', 'Uomo')}}
                {{ Form::label('Genere', 'Uomo')}}
            </div>
            <div class="radio-container">
                {{ Form::radio('Genere', 'Donna')}}
                {{ Form::label('Genere', 'Donna')}}
            </div>




            {{ Form::password('password', null, [ 'placeholder' => 'Inserisci qui la tua password...', 'id'=>'password']) }}
            @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
            {{--            <input type="password" id="password" placeholder="Password" required minlength="8" maxlength="15">--}}

            {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'placeholder'=>'Conferma password']) }}
            @if ($errors->first('password_confirmation'))
                <ul class="errors">
                    @foreach ($errors->get('password_confirmation') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{--                <input type="password" id="confirmPassword" placeholder="Confirm password" minlength="8" maxlength="15" required>--}}
            {{--
                            <div class="radio-container">
                                <input type="radio" id="male-input" name="genere">
                                <label for="male-input">Male</label>
                            </div>
                            <div class="radio-container">
                                <input type="radio" id="female-input" name="genere">
                                <label for="female-input">Female</label>
                            </div>--}}


            {{ Form::submit('Registrati', ['class' => 'btn btn-blue btn-large']) }}
            {{ Form::close() }}
            <p>Hai già un account? <a class="std-link" href="{{route('login')}}">Accedi</a>!</p>
        </div>
    </div>









{{--
    <div class="static">
        <h3>Registrazione</h3>
        <p>Utilizza questa form per registrarti al sito</p>

        <div class="container-contact">
            <div class="wrap-contact1">

                <div class="wrap-input">
                    {{ Form::label('Nome', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('Nome', '', ['class' => 'input', 'id' => 'Nome']) }}
                    @if ($errors->first('Nome'))
                        <ul class="errors">
                            @foreach ($errors->get('Nome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('Cognome', 'Cognome', ['class' => 'label-input']) }}
                    {{ Form::text('Cognome', '', ['class' => 'input', 'id' => 'Cognome']) }}
                    @if ($errors->first('Cognome'))
                        <ul class="errors">
                            @foreach ($errors->get('Cognome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('Email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::text('Email', '', ['class' => 'input','id' => 'Email']) }}
                    @if ($errors->first('Email'))
                        <ul class="errors">
                            @foreach ($errors->get('Email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('username', 'username', ['class' => 'label-input']) }}
                    {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                    @if ($errors->first('username'))
                        <ul class="errors">
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('password', 'password', ['class' => 'label-input']) }}
                    {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                    @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="wrap-input">
                    {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                    {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
                </div>

                <div class="container-form-btn">
                    {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>

    </div>
    --}}
@endsection
