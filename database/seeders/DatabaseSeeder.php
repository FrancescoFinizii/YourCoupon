<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Utente;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {


        DB::table('users')->insert([
            ['Username' => 'Persona1', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Christian', 'Cognome' => 'Curzi', 'Email' => 'chricurz@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => 'Chri.jpeg'],
            ['Username' => 'Persona2', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Ludovico', 'Cognome' => 'Gorgoglione', 'Email' => 'hjkvabauovs@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona3', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Francesco', 'Cognome' => 'Finizii', 'Email' => 'vSVKLEr@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona4', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Kristian', 'Cognome' => 'Likaj', 'Email' => 'nsbvudvbiau@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona5', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Luca', 'Cognome' => 'Rossi', 'Email' => 'svkbrevfsvd@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona6', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Mario', 'Cognome' => 'Bianchi', 'Email' => 'vretbrbv@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona7', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Antonio', 'Cognome' => 'Verdi', 'Email' => 'sfbvasfnbadg@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona8', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Marco', 'Cognome' => 'Neri', 'Email' => 'badgndgbdg@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona9', 'Password' => 'Passwordd', 'role' => 2, 'Nome' => 'Laura', 'Cognome' => 'Rossi', 'Email' => 'bdgbgrh@gmail.com', 'Nascita' => '2002/03/09', 'Genere' => 'Donna', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona10', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Giovanni', 'Cognome' => 'Bianco', 'Email' => 'giovannib@gmail.com', 'Nascita' => '2002/01/15', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona11', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Giulia', 'Cognome' => 'Verdi', 'Email' => 'giuliav@gmail.com', 'Nascita' => '2002/02/28', 'Genere' => 'Donna', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona12', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Alessandro', 'Cognome' => 'Russo', 'Email' => 'alessandror@gmail.com', 'Nascita' => '2002/04/03', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona13', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Federica', 'Cognome' => 'Esposito', 'Email' => 'federicae@gmail.com', 'Nascita' => '2002/05/18', 'Genere' => 'Donna', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona14', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Davide', 'Cognome' => 'Colombo', 'Email' => 'davidec@gmail.com', 'Nascita' => '2002/06/30', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona15', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Elisa', 'Cognome' => 'Ferrari', 'Email' => 'elisaf@gmail.com', 'Nascita' => '2002/07/14', 'Genere' => 'Donna', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona16', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Matteo', 'Cognome' => 'Galli', 'Email' => 'matteog@gmail.com', 'Nascita' => '2002/08/27', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona17', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Silvia', 'Cognome' => 'Conti', 'Email' => 'silviac@gmail.com', 'Nascita' => '2002/09/10', 'Genere' => 'Donna', 'Telefono' => '3913913913', 'ProPic' => null],
            ['Username' => 'Persona18', 'Password' => 'Passwordd', 'role' => 1, 'Nome' => 'Giacomo', 'Cognome' => 'Moretti', 'Email' => 'giacomom@gmail.com', 'Nascita' => '2002/10/23', 'Genere' => 'Uomo', 'Telefono' => '3913913913', 'ProPic' => null]
        ]);

        DB::table('azienda')->insert([
            ['RagioneSociale' => 'Nike', 'Sede' => 'Milano, Italia', 'Tipologia' => 'Scarpe e Abbigliamento', 'Descrizione' => 'Azienda pilastro nel campo dell\'abbigliamento e delle scarpe sportive', 'Mail' => 'info@nike.com', 'Link' => 'nike.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Rolex', 'Sede' => 'Londra, Regno Unito', 'Tipologia' => 'Orologi', 'Descrizione' => 'Azienda pilastro nel campo degli orologi di lusso', 'Mail' => 'info@rolex.com', 'Link' => 'rolex.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Adidas', 'Sede' => 'Grottammare, Italia', 'Tipologia' => 'Scarpe e Abbigliamento', 'Descrizione' => 'Azienda pilastro nel campo dell\'abbigliamento e delle scarpe sportive', 'Mail' => 'info@adidas.com', 'Link' => 'adidas.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Samsung', 'Sede' => 'Seul, Corea del Sud', 'Tipologia' => 'Elettronica', 'Descrizione' => 'Azienda leader nella produzione di dispositivi elettronici', 'Mail' => 'info@samsung.com', 'Link' => 'samsung.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Apple', 'Sede' => 'Cupertino, California, USA', 'Tipologia' => 'Elettronica', 'Descrizione' => 'Azienda innovativa nel settore della tecnologia', 'Mail' => 'info@apple.com', 'Link' => 'apple.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Sony', 'Sede' => 'Tokyo, Giappone', 'Tipologia' => 'Elettronica', 'Descrizione' => 'Azienda rinomata per la produzione di prodotti elettronici di qualità', 'Mail' => 'info@sony.com', 'Link' => 'sony.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Canon', 'Sede' => 'Tokyo, Giappone', 'Tipologia' => 'Fotografia', 'Descrizione' => 'Azienda specializzata in prodotti fotografici di alta qualità', 'Mail' => 'info@canon.com', 'Link' => 'canon.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Dell', 'Sede' => 'Round Rock, Texas, USA', 'Tipologia' => 'Tecnologia e Informatica', 'Descrizione' => 'Azienda leader nella produzione di computer e soluzioni tecnologiche', 'Mail' => 'info@dell.com', 'Link' => 'dell.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'LG', 'Sede' => 'Seul, Corea del Sud', 'Tipologia' => 'Elettronica', 'Descrizione' => 'Azienda nota per la produzione di elettrodomestici e dispositivi elettronici', 'Mail' => 'info@lg.com', 'Link' => 'lg.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Bose', 'Sede' => 'Framingham, Massachusetts, USA', 'Tipologia' => 'Audio', 'Descrizione' => 'Azienda specializzata in sistemi audio di alta qualità', 'Mail' => 'info@bose.com', 'Link' => 'bose.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'GoPro', 'Sede' => 'San Mateo, California, USA', 'Tipologia' => 'Fotografia e Videocamere', 'Descrizione' => 'Azienda famosa per le sue fotocamere d\'azione', 'Mail' => 'info@gopro.com', 'Link' => 'gopro.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Microsoft', 'Sede' => 'Redmond, Washington, USA', 'Tipologia' => 'Tecnologia e Software', 'Descrizione' => 'Azienda leader nel settore del software e delle soluzioni tecnologiche', 'Mail' => 'info@microsoft.com', 'Link' => 'microsoft.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Amazon', 'Sede' => 'Seattle, Washington, USA', 'Tipologia' => 'E-commerce e Tecnologia', 'Descrizione' => 'Azienda leader nel campo dell\'e-commerce e dei servizi cloud', 'Mail' => 'info@amazon.com', 'Link' => 'amazon.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'Tesla', 'Sede' => 'Palo Alto, California, USA', 'Tipologia' => 'Automobili e Tecnologia', 'Descrizione' => 'Azienda rivoluzionaria nella produzione di veicoli elettrici', 'Mail' => 'info@tesla.com', 'Link' => 'tesla.com', 'Telefono' => '3913913913', 'Logo' => null],
            ['RagioneSociale' => 'IBM', 'Sede' => 'Armonk, New York, USA', 'Tipologia' => 'Tecnologia e Software', 'Descrizione' => 'Azienda rinomata per le sue soluzioni software e servizi di tecnologia', 'Mail' => 'info@ibm.com', 'Link' => 'ibm.com', 'Telefono' => '3913913913', 'Logo' => null]
        ]);

        DB::table('offerta')->insert([
            ['Titolo' => 'AirJordan15', 'Prezzo' => 149.99, 'Sconto' => 20, 'Azienda' => '1', 'Inizio' => '2022/03/09', 'Scadenza' => '2023/03/09', 'Fruizione' => 'Online', 'Descrizione' => 'Offerta Bellissima', 'FotoProd' => null],
            ['Titolo' => 'Rolex5', 'Prezzo' => 4999.99, 'Sconto' => 20, 'Azienda' => '2', 'Inizio' => '2022/03/09', 'Scadenza' => '2023/03/09', 'Fruizione' => 'In negozio', 'Descrizione' => 'Offerta Bellissima', 'FotoProd' => null],
            ['Titolo' => 'AdidasSS', 'Prezzo' => 85.00, 'Sconto' => 20, 'Azienda' => '3', 'Inizio' => '2022/03/09', 'Scadenza' => '2023/03/09', 'Fruizione' => 'Online', 'Descrizione' => 'Offerta Bellissima', 'FotoProd' => null],
            ['Titolo' => 'Nike Air Max', 'Prezzo' => 129.99, 'Sconto' => 10, 'Azienda' => '4', 'Inizio' => '2022/05/15', 'Scadenza' => '2023/05/30', 'Fruizione' => 'In negozio', 'Descrizione' => 'Sneakers da corsa leggere e comode.', 'FotoProd' => null],
            ['Titolo' => 'Samsung Galaxy S21', 'Prezzo' => 999.99, 'Sconto' => 15, 'Azienda' => '5', 'Inizio' => '2022/05/15', 'Scadenza' => '2023/05/30', 'Fruizione' => 'Online', 'Descrizione' => 'Il nuovo flagship smartphone di Samsung con fotocamera potenziata.', 'FotoProd' => null],
            ['Titolo' => 'Apple MacBook Pro', 'Prezzo' => 1999.99, 'Sconto' => 10, 'Azienda' => '6', 'Inizio' => '2022/05/15', 'Scadenza' => '2023/05/30', 'Fruizione' => 'In negozio', 'Descrizione' => 'Potente e versatile, il MacBook Pro è perfetto per professionisti creativi.', 'FotoProd' => null],
            ['Titolo' => 'Sony PlayStation 5', 'Prezzo' => 499.99, 'Sconto' => 10, 'Azienda' => '7', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'Online', 'Descrizione' => 'La console di nuova generazione per il gaming immersivo.', 'FotoProd' => null],
            ['Titolo' => 'Canon EOS R5', 'Prezzo' => 3499.99, 'Sconto' => 15, 'Azienda' => '8', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'In negozio', 'Descrizione' => 'Fotocamera mirrorless professionale con prestazioni eccezionali.', 'FotoProd' => null],
            ['Titolo' => 'Dell XPS 15', 'Prezzo' => 1899.99, 'Sconto' => 10, 'Azienda' => '9', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'In negozio', 'Descrizione' => 'Laptop potente con schermo InfinityEdge e design elegante.', 'FotoProd' => null],
            ['Titolo' => 'Nike Air Force 1', 'Prezzo' => 99.99, 'Sconto' => 20, 'Azienda' => '10', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'In negozio', 'Descrizione' => 'Sneakers iconiche per uno stile urbano.', 'FotoProd' => null],
            ['Titolo' => 'LG OLED TV', 'Prezzo' => 1999.99, 'Sconto' => 15, 'Azienda' => '11', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'Online', 'Descrizione' => 'TV OLED con immagini realistiche e neri profondi.', 'FotoProd' => null],
            ['Titolo' => 'Adidas Ultraboost', 'Prezzo' => 129.99, 'Sconto' => 10, 'Azienda' => '12', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'Online', 'Descrizione' => 'Scarpe da corsa con ammortizzazione reattiva.', 'FotoProd' => null],
            ['Titolo' => 'Apple Watch Series 6', 'Prezzo' => 399.99, 'Sconto' => 10, 'Azienda' => '13', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'Online', 'Descrizione' => 'Smartwatch avanzato con monitoraggio delle attività.', 'FotoProd' => null],
            ['Titolo' => 'Bose QuietComfort 35', 'Prezzo' => 299.99, 'Sconto' => 20, 'Azienda' => '14', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'In negozio', 'Descrizione' => 'Cuffie wireless con cancellazione attiva del rumore.', 'FotoProd' => null],
            ['Titolo' => 'GoPro Hero 9', 'Prezzo' => 349.99, 'Sconto' => 15, 'Azienda' => '15', 'Inizio' => '2022/06/01', 'Scadenza' => '2023/06/15', 'Fruizione' => 'Online', 'Descrizione' => 'Fotocamera d\'azione con video 5K e stabilizzazione avanzata.', 'FotoProd' => null]
        ]);
    }
}
