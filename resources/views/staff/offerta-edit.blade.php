@extends("staff.layout.staff-layout")
@section("title", "Offerta - Modifica")
@push("javascript")
    <script src="{{asset("js/image-edit.js")}}"></script>
@endpush
@section("content")
    <div class="form-container">
        <div class="form-heading">
            <div class="flex-centered parent-left">
                <a href="{{route("offerta.index")}}" class="flex-centered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                         class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
            </div>
            <h1>Modifica Offerta</h1>
        </div>
        {{Form::open(["route" => ["offerta.update", $offerta], "method" => "PUT", "enctype" => "multipart/form-data"])}}
        <div class="form-input">
            <div class="input-item" id="image-item-input">
                @include("component.image-item", ["size" => "100px", "path" => $offerta->foto != null ? $offerta->foto : "storage/no-image.png", "id" => "foto"])
            </div>
            <div class="input-item item-centered">
                {{Form::label("oggetto", "Oggetto: ")}}
                {{ Form::text('oggetto', $offerta->oggetto, ['class' => 'input']) }}
            </div>
            <div class="input-item">
                {{Form::label("emissione", "Emissione:")}}
                {{ Form::date('emissione', $offerta->emissione, ['class' => 'input']) }}
            </div>
            <div class="input-item">
                {{Form::label("scadenza", "Scadenza: ")}}
                {{ Form::date('scadenza', $offerta->scadenza, ['class' => 'input']) }}
            </div>
            <div class="input-item">
                {{ Form::label("prezzo", "Prezzo: ") }}
                <div class="flex-centered">
                    {{ Form::number("prezzo", $offerta->prezzo, ["class" => 'input' , "step"=>"0.01"]) }}
                    <span class="suffix">€</span>
                </div>
            </div>
            <div class="input-item">
                {{ Form::label("sconto", "Sconto: ") }}
                <div class="flex-centered">
                    {{ Form::number("sconto", $offerta->sconto, ["class" => 'input']) }}
                    <span class="suffix">%</span>
                </div>
            </div>
            <div class="input-item two-columns">
                {{Form::label("descrizione", "Descrizione: ")}}
                {{Form::textarea("descrizione", $offerta->descrizione, []) }}
            </div>
        </div>
        <div class="form-button">
            {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
        </div>
        {{Form::close()}}
    </div>
@endsection
