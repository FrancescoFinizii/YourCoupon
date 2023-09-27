@extends("admin.layout.admin-layout")
@section("title", "Statistiche - Clienti")
@push("javascript")
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="{{asset("js/statistiche-cliente.js")}}"></script>
@endpush
@section("content")
        <div class="form-container">
            <div class="form-heading">
                <a href="{{route("statistiche.index")}}" class="parent-left flex-centered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
                <h1>Statistiche Clienti</h1>
            </div>
            {{Form::open(["data-route" => route("statistiche.cliente"), "method" => "POST", "id"=>"form"])}}
            <div class="form-input">
                <div class="two-columns input-item " id="coupon-div">
                    <h2 id="coupon"></h2>
                </div>
                <div class="input-item two-columns">
                    {{Form::label("username", "Seleziona un cliente: ")}}
                    <div class="search-bar">
                        {{Form::text("username", null, ["id" => "username", "class" => "input", "placeholder" => "Ricerca username", "data-route" => route("cliente.search")])}}
                        <button id="gogo" class="btn-blue" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                    <div id="results">
                        @include("admin.cliente-search")
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </section>
@endsection
