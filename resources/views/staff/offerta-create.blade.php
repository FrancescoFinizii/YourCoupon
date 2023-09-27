@extends("staff.layout.staff-layout")
@section("title", "Offerta - Aggiungi")
@push("javascript")
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="{{asset("js/offerta.js")}}"></script>
@endpush
@section("content")
    <div class="form-container" style="min-height: 570px;">
        <div class="form-heading">
            <a href="{{route("offerta.index")}}" class="parent-left flex-centered">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
            <h1>Aggiungi Offerta</h1>
        </div>
        <div class="form-step flex-centered">
            <div class="step step-prev flex-centered">
                <span>1</span>
                <span class="step-name step-name-green">Seleziona azienda</span>
            </div>
            <div class="line">
                <div id="white-line" class="line-step"></div>
            </div>
            <div id="step-two" class="step step-next flex-centered">
                <span>2</span>
                <span class="step-name">Compila modulo</span>
            </div>
        </div>
        <div id="data">
            @include("staff.offerta-create-step-one")
        </div>

    </div>
@endsection
