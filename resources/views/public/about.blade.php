@extends("public.layout.public-layout")
@section("title", "About")
@section("content")
    <section class="about">
        <header class="about-header">
            <h2>YourCoupon: La tua occasione per risparmiare.</h2>
        </header>
        <p>
            <b>YourCoupon</b> è un portale gratuito specializzato nella ricerca e diffusione di <b>codici sconto</b> e <b>offerte</b>.
            Dal 2023 <b>YourCoupon</b> permette a milioni di utenti di trovare il miglior prezzo online.
            Infatti, grazie alla sezione Promo, gli utenti hanno la possibilità di visualizzare il catalogo delle
            offerte dei più <b>importanti siti e-commerce</b> e accedere ai relativi codici sconto.
            L’obiettivo è quello di offrire agli utenti tutti gli strumenti utili per poter <b>risparmiare nei propri acquisti</b>.
        </p>
    </section>
    <section class="contact-section" style="background-image:url({{url('img/about.jpg')}});">
        <div class="contact">
            <header>
                <h1>Contatti</h1>
            </header>
            <address>
                <div class="flex-centered">
                    <a href="tel:3115552368">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        311 555 2368
                    </a>
                </div>
                <div class="flex-centered">
                    <a href="mailto:YourCoupon.staff@example.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>
                        YourCoupon.staff@example.com
                    </a>
                </div>

                <div class="flex-centered">
                    <a href="https://goo.gl/maps/BdGKS9Lk3qiFF5We9">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        Via Brecce Bianche 12, Ancona
                    </a>
                </div>
            </address>
        </div>
    </section>
    <section class="about">
        <h2>La nostra storia</h2>
        <p>
            YourCoupon è stato pensato per essere lo strumento che gli utenti utilizzano quotidianamente per
            acquistare il prodotto più adatto al prezzo più conveniente. Allo stesso tempo, YourCoupon lavora
            costantemente per fornire un traffico di qualità ai negozi online, così da permettere loro di potenziare
            le loro vendite e rafforzare il loro brand.
            <br><br>
            Abbiamo stretto accordi con numerosi negozi per fornirti coupon esclusivi e sconti speciali. Il
            nostro obiettivo è semplificare il processo di ricerca di offerte e rendere la tua esperienza di
            shopping più conveniente e gratificante. Esplora le nostre offerte, trova i coupon che meglio si adattano
            alle tue esigenze e risparmia sui tuoi acquisti. Siamo qui per aiutarti a ottenere il massimo valore
            dal tuo denaro.
            <br><br>
            YourCoupon è una piattaforma responsabile e sostenibile per l’ambiente: utilizza fonti di energia
            alternativa e impiega le risorse in modo consapevole.
        </p>
    </section>
@endsection
