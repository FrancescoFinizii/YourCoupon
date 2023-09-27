<ul id="results-list">
    @forelse($utenti as $utente)
        <li class="results-item" data-id="{{$utente->utenteable->id}}">
            <img class="table-image-preview" width="20" height="20" src="{{asset($utente->utenteable->foto)}}">
            {{$utente->username}}
        </li>
    @empty
        <div class="flex-centered">
            Nessun Risultato
        </div>
    @endforelse
</ul>
