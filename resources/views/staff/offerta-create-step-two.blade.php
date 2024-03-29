{{Form::open(["route" => "offerta.store", "method" => "POST", "enctype" => "multipart/form-data"])}}
<div class="form-input">
    <div class="input-item">
        <label name="AziendaID">Azienda ID:</label>
        <div class="input">{{$azienda->id}}</div>
        {{ Form::hidden('AziendaID', \Illuminate\Support\Facades\Crypt::encrypt($azienda->id)) }}
    </div>
    <div class="input-item">
        {{Form::label("oggetto", "Oggetto: ")}}
        {{ Form::text('oggetto', null, ['class' => 'input']) }}
    </div>
    <div class="input-item">
        {{Form::label("emissione", "Emissione:")}}
        {{ Form::date('emissione', null, ['class' => 'input']) }}
    </div>
    <div class="input-item">
        {{Form::label("scadenza", "Scadenza: ")}}
        {{ Form::date('scadenza', null, ['class' => 'input']) }}
    </div>
    <div class="input-item">
        {{ Form::label("prezzo", "Prezzo: ") }}
        <div class="flex-centered">
            {{ Form::number("prezzo", null, ["class" => 'input' , "step"=>"0.01"]) }}
            <span class="suffix">€</span>
        </div>
    </div>
    <div class="input-item">
        {{ Form::label("sconto", "Sconto: ") }}
        <div class="flex-centered">
            {{ Form::number("sconto", null, ["class" => 'input']) }}
            <span class="suffix">%</span>
        </div>
    </div>
    <div class="input-item">
        {{ Form::label("foto", "Foto: ") }}
        {{ Form::file("foto", ["accept" => ".jpg, .jpeg, .png", 'class' => 'input' ]) }}
    </div>
    <div class="input-item two-columns">
        {{Form::label("descrizione", "Descrizione: ")}}
        {{Form::textarea("descrizione", null, []) }}
    </div>
</div>
<div class="form-button">
    <button id="back" class="btn btn-light flex-centered" type="button" data-route="{{route("offerta.create.step.one")}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>Back
    </button>
    {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
</div>
{{Form::close()}}
