@extends('level3.faq.admin_layout')
@section('title', 'CRUD Faq')
@section('crudfaq-content')

    <div class="faq-crud-box">
        <div class="crudfaq-content-card">
            <h1 class="div-heading-crudfaq">CRUD FAQ</h1>
            <div>
                {{ Form::open(array('route' => 'action', 'id' => 'crudFaqForm')) }}
                {{ Form::token() }}

                <script src="{{ asset('js/ludovico/crudfaq.js') }}"></script>
                <div class="table-btn-crudfaq">
                    <a href="{{ route('action') }}">
                        <button type="button" class="insert-button faq-button">Inserisci una nuova FAQ</button>
                    </a>

                    {{-- utilizzo due submit button a cui assegno lo stesso nome con cui gestirò il comportamento dell'action della form nel CrudFaqController                --}}
                    {{ Form::submit('Modifica FAQ selezionata', ['class' => 'modify-button faq-button', 'name' => 'submitbutton', 'id' => 'modificaFAQButton']) }}
                    {{ Form::submit('Elimina FAQ selezionata', ['class' => 'delete-button faq-button', 'name' => 'submitbutton', 'id' => 'eliminaFAQButton']) }}

                </div>
                @foreach ($faqs as $faq)
                    <table class="faq-table" id="faqTable">
                        <tr>
                            <th class="th-round-top">ID {{ $faq->id }}</th>
                            <th colspan="2" class="th-select">Select</th>
                        </tr>
                        <tr>
                            <th>Domanda</th>
                            <td>{{ $faq->Domanda }}</td>
                            <td>{{ Form::radio('faq_id', $faq->id, false, ['class' => 'radiofaq']) }}</td>
                        </tr>
                        <tr>
                            <th class="th-round-bottom">Risposta</th>
                            <td>{{ $faq->Risposta }}</td>
                        </tr>

                        {{-- </form> --}}
                        {{ Form::close() }}

                    </table>

                @endforeach

                @include('level3.faq.crud_faq.paginator', ['paginator' => $faqs])

            </div>


        </div>
    </div>
@endsection
