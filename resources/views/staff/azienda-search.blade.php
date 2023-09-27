<ul id="results-list">
    @forelse($aziende as $azienda)
        <li class="results-item" data-id="{{$azienda->id}}">
            <img class="table-image-preview" width="20" height="20" src="{{asset($azienda->logo)}}">
            {{$azienda->ragioneSociale}}
        </li>
    @empty
        <div class="flex-centered">
            Nessun Risultato
        </div>
    @endforelse
</ul>
