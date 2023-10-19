@extends("staff.layout.staff-layout")
@section("title", "Offerta - Gestione")
@push('javascript')
    <script src="{{asset("js/delete.js")}}"></script>
@endpush
@section("content")
    <div class="table-container">
        <div class="table-title">
            <h2>Gestione Offerta</h2>
            <div class="flex-centered parent-left">
                <a href="{{route("offerta.create")}}" class="btn-rect btn-green flex-centered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg> Aggiungi
                </a>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>oggetto</th>
                <th>emissione</th>
                <th>scadenza</th>
                <th>prezzo</th>
                <th>sconto</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($offerte as $offerta)
                <tr>
                    <td>{{ $offerta->id }}</td>
                    <td>
                        <img class="table-image-preview" width="50" height="50" src="@if($offerta->foto != null) {{ asset($offerta->foto) }} @else {{ asset($offerta->azienda->logo) }} @endif">
                    </td>
                    <td>{{ $offerta->oggetto }}</td>
                    <td>{{ $offerta->emissione }}</td>
                    <td>{{ $offerta->scadenza }}</td>
                    <td>{{ $offerta->prezzo }} €</td>
                    <td>{{ $offerta->sconto }}%</td>
                    <td class="action">
                        <div class="action-cont flex-centered">
                            <a href="{{route("promo.show", $offerta->id)}}" class="btn-rect btn-yellow">
                                <div class="flex-centered">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                    Visualizza
                                </div>
                            </a>
                            <a href="{{route("offerta.edit", $offerta->id)}}" class="btn-rect btn-blue">
                                <div class="flex-centered">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    Modifica
                                </div>
                            </a>
                            {{ Form::open(["route" => ["offerta.destroy", $offerta->id], "method" => "DELETE"]) }}
                            <button id="{{$offerta->id}}" type="button" class="btn-rect btn-red item-to-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                                Elimina
                            </button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nessun Risultato</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $offerte->links("component.pagination") }}
    </div>
@endsection
