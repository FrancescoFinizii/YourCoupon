@extends('faq.admin_layout')
@section('title', 'Chi siamo')
@section('crudfaq-content')
    <div style="padding: 10px">


        <div class="about-section">
            <h1>Informazioni riguardo questo sito</h1>
            <p>YourCoupon è un portale gratuito specializzato nella ricerca e diffusione di codici sconto e offerte. Nel
                2017 abbiamo vinto la Awin Challenge e ad oggi collaboriamo con oltre 1300 eCommerce per garantire un
                risparmio vero e sicuro negli acquisti online.
                Lo staff di YourCoupon è formato dal team operativo della YourCoupon-Srl, composto da persone giovani e
                motivate nell’innovazione e nello sviluppo di servizi web con oltre 10 anni di esperienza nel settore
                degli sconti e coupon.

            <hr style="width: 40%">
            <p>Abbiamo stretto accordi con numerosi negozi per fornirti coupon esclusivi e sconti speciali. Il
                nostro obiettivo è semplificare il processo di ricerca di offerte e rendere la tua esperienza di
                shopping più conveniente e gratificante.</p>
            <p>Esplora le nostre offerte, trova i coupon che meglio si adattano alle tue esigenze e risparmia sui tuoi
                acquisti. Siamo qui per aiutarti a ottenere il massimo valore dal tuo denaro.</p>
            <h2>Ecco alcune delle aziende con cui collaboriamo:</h2>
            <div>

                <img src="https://static.vecteezy.com/ti/vettori-gratis/t2/10994412-nike-logo-nero-con-nome-abiti-design-icona-astratto-calcio-vettore-illustrazione-con-bianca-sfondo-gratuito-vettoriale.jpg" alt="logo-uni"
                     class="img-collaboratori">
                <img src="https://static.brusheezy.com/system/resources/previews/000/004/863/original/hp-logo-photoshop-psds.jpg" alt="logo-uni"
                     class="img-collaboratori">
                <img src="https://egress.storeden.net/gallery/59ef404102e58ea1bfcf7caf" alt="logo-uni"
                     class="img-collaboratori">
                <img src="https://shortnorth.org/wp-content/uploads/2019/09/klarna-logo.png" alt="logo-uni"
                     class="img-collaboratori">

            </div>
            </p>
        </div>

        <div class="about-section">

            <h1>Progetto di Tecnologie Web</h1>
            <p>Questo sito è stato realizzato come progetto intracorso per l'esame del corso di Tecnologie Web
                dell'Università
                Politecnica delle marche nell'anno 2022/2023.</p>
            <img src="https://www.sporteconomy.it/wp-content/uploads/2019/05/logo_univpm.jpg" alt="logo-uni"
                 class="img-chi-siamo">
        </div>

        <div>
            <div>

                <h2 class="about-heading">Il nostro team:</h2>
            </div>
            <div class="about-container">
                <div>
                    <div class="about-card">
                        <img class="img-chi-siamo"
                             src="https://media-assets.wired.it/photos/63a04e3a2c89ea5ab75cf190/1:1/w_604,h_604,c_limit/Cul-avatar.jpg"
                             alt="immagine componente gruppo 1">
                        <div class="info-container">
                            <h2>Curzi Christian</h2>
                            <p class="title">Sviluppatore Web</p>
                            <p>Un grande uomo frequentante il corso di ingegneria informatica e dell'automazione presso
                                Univpm.</p>
                            <button>GitHub</button>

                        </div>
                    </div>

                    <div class="about-card">
                        <img class="img-chi-siamo"
                             src="https://pyxis.nymag.com/v1/imgs/630/6e0/eb215ad90cd826b9e57ff505f54c5c7228-07-avatar.1x.rsquare.w1400.jpg"
                             alt="immagine componente gruppo 2">
                        <div class="info-container">
                            <h2>Finizii Francesco</h2>
                            <p class="title">Web Sviluppatore</p>
                            <p>Un'esperto navigatore frequentante il corso di ingegneria informatica e dell'automazione
                                presso
                                Univpm.</p>
                            <button>GitHub</button>

                        </div>
                    </div>

                    <div class="about-card">
                        <img class="img-chi-siamo"
                             src="https://static01.nyt.com/images/2022/09/16/arts/16CAMERON1/16CAMERON1-mediumSquareAt3X.jpg"
                             alt="immagine componente gruppo 3">
                        <div class="info-container">
                            <h2>Gorgoglione Ludovico</h2>
                            <p class="title">Developer Web</p>
                            <p>Un professionista allenato frequentante il corso di ingegneria informatica e
                                dell'automazione
                                presso
                                Univpm.</p>
                            <button>GitHub</button>

                        </div>
                    </div>

                    <div class="about-card">
                        <img class="img-chi-siamo"
                             src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/sam-worthington-avatar-the-way-of-the-water-jake-sully-1670323168.jpg?crop=0.528xw:1.00xh;0.165xw,0&resize=1200:*"
                             alt="immagine componente gruppo 4">
                        <div class="info-container">
                            <h2>Likaj Kristian</h2>
                            <p class="title">Web Developer</p>
                            <p>Un campione frequentante il corso di ingegneria informatica e dell'automazione presso
                                Univpm.</p>
                            <button>GitHub</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
