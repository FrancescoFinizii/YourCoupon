<ul id="results-list">
    @forelse($offerte as $offerta)
        <li class="results-item" data-id="{{$offerta->id}}">
            <img class="table-image-preview" width="20" height="20" src="{{asset($offerta->azienda->logo)}}">
            {{$offerta->oggetto}}
        </li>
    @empty
        <div class="flex-centered">
            Nessun Risultato
        </div>
    @endforelse
</ul>
