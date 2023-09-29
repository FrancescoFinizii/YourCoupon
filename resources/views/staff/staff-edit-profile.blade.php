@extends("staff.layout.staff-layout")
@section("title", "Staff - Profilo")
@push('javascript')
    <script src="{{asset("js/image-edit.js")}}"></script>
@endpush
@section("content")
    <div class="form-container">
        <div class="form-heading">
            <h1>Modifica Profilo</h1>
        </div>
        {{Form::open(["route" => "staff.update.profile", "method" => "PUT", "enctype" => "multipart/form-data"])}}
        <div class="form-input">
            <div class="input-item" id="image-item-input">
                @include("component.image-item", ["size" => "100px", "path" => Auth::user()->utenteable->foto, "id" => "foto"])
            </div>
            <div class="input-item item-centered">
                {{Form::label("username", "Username: ")}}
                {{ Form::text('username', Auth::user()->username, ['class' => 'input']) }}
            </div>
            <div class="input-item">
                {{Form::label("nome", "Nome: ")}}
                {{ Form::text('nome', Auth::user()->utenteable->nome, ['class' => 'input']) }}
            </div>
            <div class="input-item">
                {{Form::label("cognome", "Cognome: ")}}
                {{ Form::text('cognome', Auth::user()->utenteable->cognome, ['class' => 'input']) }}
            </div>
        </div>
        <div class="form-button">
            {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
        </div>
        {{Form::close()}}
    </div>
@endsection
