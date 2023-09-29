<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Default Cliente

        DB::table('cliente')->insert([
            'id' => 1,
            'nome' => 'cliente',
            'cognome' => 'cliente',
            'email' => 'cliente@prova.com',
            'genere' => 'Uomo',
            'telefono' => '3331112222',
            'dataNascita' => date('Y-m-d', mktime(0, 0, 0, 1, 1, 1990)),
            'foto' => 'storage/avatar.png',
        ]);


        // Default Staff

        DB::table('staff')->insert([
            'id' => 1,
            'nome' => 'staff',
            'cognome' => 'staff',
            'foto' => 'storage/avatar.png',
        ]);

        //Default Users

        DB::table('utente')->insert([
            [
                'id' => 1,
                'username' => 'clieclie',
                'password' => bcrypt('Qwerty123@'),
                'utenteable_id' => 1,
                'utenteable_type' => 'App\Models\Cliente',
                'remember_token' => Str::random(10)
            ],

            [
                'id' => 2,
                'username' => 'staffstaff',
                'password' => bcrypt('Qwerty123@'),
                'utenteable_id' => 1,
                'utenteable_type' => 'App\Models\Staff',
                'remember_token' => Str::random(10)
            ],

            // Admin

            [
                'id' => 3,
                'username' => 'adminadmin',
                'password' => bcrypt('Qwerty123@'),
                'utenteable_id' => null,
                'utenteable_type' => "Admin",
                'remember_token' => Str::random(10)
            ]
        ]);


        // Clienti
        Cliente::factory()->hasUtente(1)->count(20)->create();

        // Staff
        Staff::factory()->hasUtente(1)->count(20)->create();

        // Aziende
        DB::table('azienda')->insert([
            [
                'id' => 1,
                'ragioneSociale' => 'Lego',
                'sede' => 'Danimarca',
                'tipologia' => 'Giocattoli',
                'descrizione' => 'Scatena la tua immaginazione con i mattoncini LEGO®! Affascinano costruttori e costruttrici di tutte le età, ispirando una creatività senza limiti.',
                'logo' => 'storage/aziende/lego.png',
            ],
            [
                'id' => 2,
                'ragioneSociale' => 'Nike',
                'sede' => 'Stati Uniti',
                'tipologia' => 'Abbigliamento',
                'descrizione' => 'Nike è leader nel mondo degli articoli sportivi. Scopri i modelli di sneakers e l\'abbigliamento sportivo Nike e goditi la massima qualità.',
                'logo' => 'storage/aziende/nike.png',
            ],
            [
                'id' => 3,
                'ragioneSociale' => 'Durex',
                'sede' => 'Londra',
                'tipologia' => 'Benessere',
                'descrizione' => 'Con oltre 90 anni di esperienza nel mondo del benessere sessuale, noi di Durex sfidiamo le convenzioni e promuoviamo la protezione da malattie sessualmente trasmissibili e la prevenzione di gravidanze indesiderate.',
                'logo' => 'storage/aziende/durex.jpg',
            ],
            [
                'id' => 4,
                'ragioneSociale' => 'YvesSaintLaurent',
                'sede' => 'Parigi',
                'tipologia' => 'Moda',
                'descrizione' => 'Saint Laurent ha rivoluzionato il mondo della moda con lo smoking da donna: Le Smoking nel 1966. Prima di questo momento, era un capo riservato esclusivamente agli uomini e nessuna donna era autorizzata ad entrare nei ristoranti con i pantaloni.',
                'logo' => 'storage/aziende/YvesSaintLaurent.jpg',
            ],
            [
                'id' => 5,
                'ragioneSociale' => 'Apple',
                'sede' => 'California',
                'tipologia' => 'Elettronica, Informatica',
                'descrizione' => 'Considerata una delle società tecnologiche Big Tech che produce sistemi operativi, smartphone, computer e dispositivi multimediali',
                'logo' => 'storage/aziende/apple.png',
            ],
            [
                'id' => 6,
                'ragioneSociale' => "McDonald's",
                'sede' => 'Chicago',
                'tipologia' => 'Alimentare',
                'descrizione' => "La McDonald's Corporation è una catena di ristoranti di fast food statunitense. Fino al 2018 è stata la maggior catena di fast food al mondo per numero di punti vendita",
                'logo' => 'storage/aziende/mc.png',
            ],
            [
                'id' => 7,
                'ragioneSociale' => "Amazon",
                'sede' => 'Seattle ',
                'tipologia' => 'Informatico',
                'descrizione' => "Amazon.com, Inc. è un'azienda di commercio elettronico statunitense. È la più grande Internet company al mondo.",
                'logo' => 'storage/aziende/amazon.png',
            ]
        ]);


        $today = Carbon::today()->format("Y-m-d");
        $oneMonthLater = Carbon::today()->addMonths()->format("Y-m-d");
        // Offerte
        DB::table('offerta')->insert([
            [
                'id' => 1,
                'oggetto' => 'LEGO® CITY Accademia di addestramento della polizia',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 89.99,
                'sconto' => 20,
                'foto' => 'storage/offerte/accademia polizia.png',
                'descrizione' => 'Il set Accademia di addestramento della polizia LEGO® City (60372) è caratterizzato da una stazione di polizia modulare a più stanze e da un percorso a ostacoli all’aperto con divertenti strutture, tra cui una parete da arrampicata, una scala orizzontale e una teleferica. Include anche un fuoristrada sterzabile, 6 minifigure e un cavallo.',
                'AziendaID' => 1
            ],
            [
                'id' => 2,
                'oggetto' => 'LEGO® DC Batman™ Batmobile™ Tumbler',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 269.99,
                'sconto' => 30,
                'foto' => 'storage/offerte/batmobile.png',
                'descrizione' => 'LEGO® DC Batman™ Batmobile™ Tumbler (76240) metterà alla prova le tue abilità nella costruzione e ti permetterà di riprodurre lo stile di uno dei veicoli più rappresentativi della storia del cinema.',
                'AziendaID' => 1
            ],
            [
                'id' => 3,
                'oggetto' => 'Nike: 3x2 T-SHIRT 👕 PAGHI 2, 1 è IN OMAGGIO',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => null,
                'sconto' => 33,
                'foto' => null,
                'descrizione' => 'Nike Online Store non smette mai di stupire con le sue promozioni. Approfitta ora del 3×2: aggiungi 3 maglie a tuo piacimento nel carrello e una è in regalo! L’offerta è valida solitamente online e con qualunque t-shirt disponibile',
                'AziendaID' => 2
            ],
            [
                'id' => 4,
                'oggetto' => 'Nike Air Force 1 \'07',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 119.99,
                'sconto' => 15,
                'foto' => 'storage/offerte/nike air force.png',
                'descrizione' => "La leggenda continua a risplendere con Nike Air Force 1 '07, l'edizione originale da basket che rivisita un classico molto amato: strati esterni resistenti con impunture, finiture essenziali e il giusto tocco di lucentezza per valorizzarti al meglio.",
                'AziendaID' => 2
            ],
            [
                'id' => 5,
                'oggetto' => 'Durex: 3x2 Preservativi. PAGHI 2, 1 è IN OMAGGIO',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => null,
                'sconto' => 33,
                'foto' => null,
                'descrizione' => 'Acquista online oggi stesso e scopri la nostra linea di preservativi progettata per la tua esperienza sessuale. Approfitta ora del 3×2: aggiungi 3 confezioni dello stesso tipo nel carrello e una è in regalo! L’offerta è valida solitamente online. I preservativi Durex sono dispositivi medici CE1639/CE2409/CE0123/CE0120.',
                'AziendaID' => 3
            ],
            [
                'id' => 6,
                'oggetto' => 'Profilattico Durex Comfort Xl 12 Pezzi x3 ',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 27.99,
                'sconto' => 10,
                'foto' => 'storage/offerte/durex xl.jpg',
                'descrizione' => 'Preservativi trasparenti e lubrificati in lattice di gomma naturale. Il profilattico "extra-large" in lattice di gomma naturale offre comfort e vestibilità grazie alla sua larghezza elevata.',
                'AziendaID' => 3
            ],
            [
                'id' => 7,
                'oggetto' => 'Yves Saint Laurent La Nuit de L\'Homme Eau de Toilette per uomo',
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 78.00,
                'sconto' => 20,
                'foto' => "storage/offerte/la nuit de l'homme.jpg",
                'descrizione' => "Una fragranza per notti infinite? La Nuit de L'Homme de Yves Saint Laurent, è la tua migliore arma di seduzione, l'aroma che ti accompagna negli incontri più affascinanti e complice nei momenti inaspettati. Vuoi di più? Passione, intensità, alte temperature... Nuit de L'Homme è tutto ciò che serve per esaltare il tuo potere di seduzione innato, puro e unico.",
                'AziendaID' => 4
            ],
            [
                'id' => 8,
                'oggetto' => "APPLE MacBook Air 15'', Chip M2, 8 CPU 10 GPU, 256GB, (2023)",
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 1299.99,
                'sconto' => 15,
                'foto' => 'storage/offerte/macBook.png',
                'descrizione' => 'Il nuovo MacBook Air 15" ha uno spettacolare display Liquid Retina che ti dà ancora più spazio per fare quello che vuoi. E insieme al modello da 13" completa la linea Air per darti più scelta che mai. Hanno entrambi i superpoteri del chip M2 e fino a 18 ore di autonomia:1 performance incredibili, in un design ultraportatile.',
                'AziendaID' => 5
            ],
            [
                'id' => 9,
                'oggetto' => "Apple iPhone 14 Pro Max",
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => 1129.99,
                'sconto' => 10,
                'foto' => 'storage/offerte/iphone 14 pro.jpg',
                'descrizione' => "Apple iPhone 14 Pro Max è uno smartphone iOS con caratteristiche all'avanguardia che lo rendono una scelta eccellente per ogni tipo di utilizzo, rappresentando uno dei migliori dispositivi mobili mai realizzati. Dispone di un grande display da 6.7 pollici e di una risoluzione da 2796x1290 pixel, fra le più elevate attualmente in circolazione. Le funzionalità offerte da questo Apple iPhone 14 Pro Max sono innumerevoli e tutte al top di gamma. A cominciare dal modulo 5G che permette un trasferimento dati e una navigazione in internet eccellente, passando per la connettività Wi-fi e il GPS.
                                  L'eccellenza di questo Apple iPhone 14 Pro Max è completata da una fotocamera con un sensore da ben 48 megapixel che permette di scattare foto di alta qualità con una risoluzione di 8000x6000 pixel e di registrare video in 4K alla risoluzione di 3840x2160 pixel. Lo spessore di 7.9mm è veramente contenuto e rende questo Apple iPhone 14 Pro Max ancora più spettacolare.",
                'AziendaID' => 5
            ],
            [
                'id' => 10,
                'oggetto' => "Codice promo McDonald's del 10% sui tuoi ordini via App",
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => null,
                'sconto' => 10,
                'foto' => null,
                'descrizione' => null,
                'AziendaID' => 6
            ],
            [
                'id' => 11,
                'oggetto' => "Amazon: per te un REGALO con la Lista Nascita",
                'emissione' => $today,
                'scadenza' => $oneMonthLater,
                'prezzo' => null,
                'sconto' => 100,
                'foto' => null,
                'descrizione' => "Codice sconto valido su una spesa minima di almeno 20€ Regali qui sotto da scegliere: - Mangiapannolini Twist and Click Tomme Tippee, - 4 confezioni da 60 salviette umidificate WaterWipes, - Fisher-Price set baby muscoli con 4 giocattoli per neonati, - biberon anticolica Mam e un set da 2 succhietti.",
                'AziendaID' => 7
            ],
        ]);


        //FAQ
        DB::table('faq')->insert([
            [
                'id' => 1,
                'Domanda' => 'Come posso ottenere i coupon sul vostro sito?',
                'Risposta' => 'Puoi ottenere i coupon sul nostro sito cercando un brand o un offerta specifica. Una volta trovata un\'offerta di tuo interesse basta cliccare sul bottone "Ottieni Coupon" per ottenere il coupon.',
            ],
            [
                'id' => 2,
                'Domanda' => 'Devo pagare per ottenere i coupon?',
                'Risposta' => 'No, tutti i coupon che offriamo sono messi a disposizione di tutti gli utenti registrati in modo completamente gratuito.',
            ],
            [
                'id' => 3,
                'Domanda' => 'Quali sono i termini e le condizioni per l\'utilizzo dei coupon?',
                'Risposta' => 'I termini e le condizioni per l\'utilizzo dei coupon possono variare a seconda del coupon stesso e delle restrizioni imposte dai negozi o dai marchi. È importante leggere attentamente i dettagli e le condizioni riportate sulla pagina dell\'offerta di riferimento.',
            ],
            [
                'id' => 4,
                'Domanda' => 'I coupon hanno una data di scadenza?',
                'Risposta' => 'Sì, i coupon hanno una data di scadenza. È consigliabile utilizzare i coupon prima della data di scadenza per garantire che siano validi.',
            ],
            [
                'id' => 5,
                'Domanda' => 'Posso utilizzare i coupon online e nei negozi fisici?',
                'Risposta' => 'Alcuni coupon possono essere utilizzati sia online che nei negozi fisici, mentre altri possono essere validi solo per uno dei due. Verifica attentamente le descrizione dell\'offerta relativa al tuo coupon per sapere dove puoi utilizzarlo.',
            ],
            [
                'id' => 6,
                'Domanda' => 'Cosa succede se il coupon non funziona durante il processo di checkout?',
                'Risposta' => 'Se il coupon non funziona durante il processo di checkout sul sito dell\'offerente, assicurati di aver inserito correttamente il codice o di aver seguito le istruzioni specificate. Se il problema persiste, contatta l\'assistenza dell\'azienda offerente.',
            ],
            [
                'id' => 7,
                'Domanda' => 'Posso condividere i coupon con altre persone?',
                'Risposta' => 'No, i coupon sono personali, però puoi invitare altre persone a registrarsi sul nostro sito e fargli ottenere i loro coupon personali.',
            ]
        ]);

    }
}
