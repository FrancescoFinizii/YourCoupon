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
            @foreach(\App\Models\FAQ::all() as $elem)
                <details>
                    <summary><b>{{$elem->domanda}}</b></summary>
                    <div><p>{{$elem->risposta}}</p></div>
                </details>
            @endforeach
        </div>
    </section>
@endsection
