@extends('level3.faq.admin_layout')
@section('title', 'Gestione Faq')
@section('crudfaq-content')

    <div class="faq-crud-box">
        <div class="crudfaq-content-card">
            @if(isset($faq))
                <h1 class="div-heading-crudfaq">MODIFICA LA FAQ SELEZIONATA (ID: {{ $faq->id }})</h1>
            @else
                <h1 class="div-heading-crudfaq">INSERISCI UNA NUOVA FAQ</h1>
            @endif

            <div id="simpleModal" class="insert-faq-content">
                <div class="insert-faq-content-card">
                    <div class=crudfaq-form>
                        @if(isset($faq))
                            {{--                            {{ Form::model($faq, ['route' => ['updatefaq', $faq->id], 'method' => 'PUT', 'id' => 'modifyfaq', 'class' => 'crudfaq-form', 'required' => 'required']) }}--}}
                            {{ Form::open(['route' => 'update', 'id' => 'modifyfaq', 'class' => 'crudfaq-form', 'required' => 'required']) }}
                        @else
                            {{ Form::open(['route' => 'store', 'id' => 'addfaq', 'class' => 'crudfaq-form', 'required' => 'required']) }}
                        @endif

                        {{ Form::token() }}

                        <fieldset class="insert-faq-fieldset">
                            <legend><b>Domanda</b></legend>
                            {{--                            per il valore del campo text da mostrare ho usato un operatore ternario, se isset($faq) restituisce true, cioè se esiste
                                                            la variabile $faq (perché generata tramite la form con submit il bottone di mofica) allora inserisce nel campo text il valore
                                                            $faq->Domanda, cioè il testo della domanda, altrimenti lascia il campo vuoto (nel caso in cui abbiamo cliccato il tasto inserisci su crud-faq--}}
                            {{ Form::text('domanda', isset($faq) ? $faq->Domanda : '', ['class' => 'insert-faq-textinput', 'id' => 'input-domanda', 'placeholder' => 'Inserisci qui la domanda...']) }}
                            @if ($errors->first('domanda'))
                                <ul>
                                    @foreach ($errors->get('domanda') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {{--                            se esiste $faq crea un campo id hidden che verrà usato nel controller per aggiornare il record nella tabella--}}
                            @if(isset($faq))
                                {{ Form::text('id', $faq->id, ['hidden'=> 'hidden', 'class' => 'insert-faq-textinput', 'id' => 'input-domanda', 'placeholder' => 'Inserisci qui la domanda...']) }}
                            @endif

                        </fieldset>

                        <br>

                        <fieldset class="insert-faq-fieldset">
                            <legend><b>Risposta</b></legend>
                            {{ Form::textarea('risposta', isset($faq) ? $faq->Risposta : '', ['class' => 'insert-faq-textarea', 'id' => 'input-risposta', 'placeholder' => 'Inserisci qui la risposta alla domanda...', 'required' => 'required']) }}
                            @if ($errors->first('risposta'))
                                <ul>
                                    @foreach ($errors->get('risposta') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </fieldset>

                        <div class="faq-nav">
                            @if(isset($faq))
                                {{ Form::submit('Conferma Modifiche', ['class' => 'insert-button faq-button']) }}
                            @else
                                {{ Form::submit('Conferma Inserimento', ['class' => 'insert-button faq-button']) }}
                            @endif
                            {{ Form::reset('Azzera i dati immessi', ['class' => 'modify-button faq-button']) }}


                                <a href="{{ url('/crud-faq') }}">
                                <button type="button" class="delete-button faq-button"> {{isset($faq) ? 'Annulla Modifiche' : 'Annulla Inserimento'}}
                                    </button>
                            </a>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
