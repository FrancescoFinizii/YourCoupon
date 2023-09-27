<div class="form-input">
    <div class="input-item two-columns">
        {{Form::label("ragioneSociale", "Seleziona un'azienda: ")}}
        <div class="search-bar">
            {{Form::text("ragioneSociale", null, ["id" => "ragioneSociale", "class" => "input", "placeholder" => "Ricerca un azienda", "data-route" => route("azienda.search")])}}
            <button id="gogo" class="btn-blue" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        <div id="results" data-route="{{route("offerta.create.step.two")}}">
            @include("staff.azienda-search")
        </div>
    </div>
</div>



