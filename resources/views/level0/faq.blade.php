@extends('layouts.public-layout')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
@endsection
@section('script')
    <script src="{{ asset('js/ludovico/faqAccordion.js') }}"></script>
@endsection

@section('content')
    <div class="faq-content-domanda">

        <div class="faq-heading">
            <h1>FAQs</h1>
        </div>
        @foreach ($faqs as $faq)
            <div class="faq-domanda">
                <button class="faq-accordion">{{ $faq->Domanda }}</button>
                <div class="faq-risposta">
                    <p>{{ $faq->Risposta }}</p>
                </div>
            </div>
        @endforeach
    </div>
    @include('level3.faq.crud_faq.paginator', ['paginator' => $faqs])
@endsection
{{--

    @section('content')
    <div class="faq-content-domanda">
        @foreach ($faqs as $faq)
            <div class="faq-domanda">
                <button class="accordion" id="faq-accordion">{{ $faq->Domanda }}</button>
            </div>
            <div id="faq-risposta" class="faq-risposta">
                <p>{{ $faq->Risposta }}</p>
            </div>
        @endforeach
    </div>
    @include('level3.faq.crud_faq.paginator', ['paginator' => $faqs])
@endsection
--}}
