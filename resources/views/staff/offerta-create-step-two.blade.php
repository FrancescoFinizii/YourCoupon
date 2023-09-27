{{Form::open(["route" => "offerta.store", "method" => "POST"])}}
<div class="form-input">
    <div class="input-item">
        {{ Form::label("AziendaID", "Azienda ID: ") }}
        {{ Form::number('AziendaID', $azienda->id, [ 'id'=>'AziendaID', 'class' => 'input']) }}
    </div>
    <div class="input-item">
        {{Form::label("oggetto", "Oggetto: ")}}
        {{ Form::text('oggetto', null, [ 'id'=>'oggetto', 'class' => 'input']) }}
    </div>
    <div class="input-item">
        {{Form::label("emissione", "Emissione:")}}
        {{ Form::date('emissione', null, [ 'id'=>'emissione', 'class' => 'input']) }}
    </div>
    <div class="input-item">
        {{Form::label("scadenza", "Scadenza: ")}}
        {{ Form::date('scadenza', null, [ 'id'=>'scadenza', 'class' => 'input']) }}
    </div>
    <div class="input-item">
        {{ Form::label("prezzo", "Prezzo: ") }}
        <div class="flex-centered">
            {{ Form::number("prezzo", null, ["id" => "prezzo" , "class" => 'input' , "step"=>"0.01"]) }}
            <span class="suffix">€</span>
        </div>
    </div>
    <div class="input-item">
        {{ Form::label("sconto", "Sconto: ") }}
        <div class="flex-centered">
            {{ Form::number("sconto", null, ["id" => "sconto" , "class" => 'input']) }}
            <span class="suffix">%</span>
        </div>
    </div>
    <div class="input-item">
        {{ Form::label("foto", "Foto: ") }}
        {{ Form::file("foto", ["id" => "foto" , "accept" => ".jpg, .jpeg, .png", 'class' => 'input' ]) }}
    </div>
    <div class="input-item two-columns">
        {{Form::label("descrizione", "Descrizione: ")}}
        {{Form::textarea("descrizione", null, ['id' => 'descrizione']) }}
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
