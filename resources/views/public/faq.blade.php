@extends("public.layout.public-layout")
@section("title", "FAQ")
@section("content")
    <section class="faq-section">
        <header class="faq-header">
            <h1>Frequently Asked Questions</h1>
        </header>
        <div class="faq-image">
            <img src="{{asset("img/business-meeting.jpg")}}">
            <div class="gray-background">
        </div>
        </div>
        <div class="faq">
            @foreach($faqs as $faq)
                <details>
                    <summary><b>{{$faq->domanda}}</b></summary>
                    <div><p>{{$faq->risposta}}</p></div>
                </details>
            @endforeach
            {{ $faqs->links("component.pagination") }}
        </div>
    </section>
@endsection
