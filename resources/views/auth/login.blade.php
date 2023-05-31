@extends("layouts.public-layout")
@section("title", "Login")
@section("content")

    <div class="my-container" style="background-image:url({{url('img/background.jpg')}});">
        <div class="card">
            <div class="icon-container">
                <svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor"
                     viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                </svg>
            </div>
            {{ Form::open(['route' => 'login', 'class' => 'myform', 'method' => 'post']) }}
            {{ Form::token() }}
                    {{ Form::text('username', null, [ 'id'=>'username', 'placeholder' => 'Inserisci qui il tuo Username...']) }}
                @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                    {{ Form::password('password', null, [ 'placeholder' => 'Inserisci qui il tuo Username...', 'id'=>'password']) }}
                @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            {{ Form::submit('Login', ['class' => 'btn btn-blue btn-large']) }}
            </form>
            <p>Non possiedi un account? <a class="std-link" href="{{route("register")}}">Registrati!</a></p>
        </div>
    </div>
@endsection
