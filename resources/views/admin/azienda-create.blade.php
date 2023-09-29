@extends("admin.layout.admin-layout")
@section("title", "Azienda - Aggiungi")
@section("content")
    <section class="management-section" style="background-image: url({{url('img/texture.jpg')}})">
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>ATTENZIONE! Si sono verificati i seguenti errori:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <p>{{ $error }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container">
            <div class="form-heading">
                <div class="flex-centered parent-left">
                    <a href="{{route("azienda.index")}}" class="flex-centered">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                    </a>
                </div>
                <h1>Aggiungi Azienda</h1>
            </div>
            {{Form::open(["route" => "azienda.store", "method" => "POST", "enctype" => "multipart/form-data"])}}
            <div class="form-input">
                <div class="input-item">
                    {{Form::label("ragioneSociale", "Ragione sociale: ")}}
                    {{ Form::text('ragioneSociale', null, ['class' => 'input']) }}
                </div>
                <div class="input-item">
                    {{Form::label("sede", "Sede:")}}
                    {{ Form::text('sede', null, ['class' => 'input']) }}
                </div>
                <div class="input-item">
                    {{Form::label("tipologia", "Tipologia: ")}}
                    {{ Form::text('tipologia',null, ['class' => 'input']) }}
                </div>
                <div class="input-item">
                    {{ Form::label("logo", "Logo: ") }}
                    {{ Form::file("logo", ["accept" => ".jpg, .jpeg, .png", 'class' => 'input' ]) }}
                </div>
                <div class="input-item two-columns">
                    {{Form::label("descrizione", "Descrizione: ")}}
                    {{Form::textarea("descrizione", null, []) }}
                </div>
            </div>
            <div class="form-button">
                {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
                {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
            </div>
            {{Form::close()}}
        </div>
    </section>
@endsection
