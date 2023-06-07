<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogoRequest;
use App\Models\Coupon;
use App\Models\CouponPacchetto;
use Illuminate\Support\Facades\DB;
use App\Models\Pacchetto;
use App\Models\Partecipa;
use Illuminate\Http\Request;
use App\Models\Azienda;
use App\Models\Offerta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CatalogoController extends Controller
{

    protected $_aziendaModel;
    protected $_offertaModel;

    public function __construct()
    {
        $this->_offertaModel = new Offerta();
        $this->_aziendaModel = new Azienda();

        /*        $this->_offertaModel = Offerta::all();
                $this->_aziendaModel = Azienda::orderBy('RagioneSociale', 'asc')
                    ->paginate(5);*/
    }

    public function index()
    {
        /*
        - Azienda::has('offerte') è per cercare le istanze del modello Azienda che hanno almeno una offerta associata.
        - with('offerte') indica di prendere anche le offerte relative ad ogni azienda insieme alle istanze di Azienda,
          cosi si può accedere alle offerte associate ad ogni azienda in modo rapido.
        - paginate(5) esegue la paginazione dei risultati ottenuti. Cosi imposto il numero di risultati per pagina a 5
          che poi gestisco con il paginator.
        */
        $aziende = Azienda::orderBy('RagioneSociale', 'asc')->get()->pluck('RagioneSociale', 'IDAzienda');

        $this->_aziendaModel = Azienda::has('offerte')->with('offerte')->paginate(10);

        return view('level0.catalogo.catalogo', ['aziende' => $aziende, 'aziendeConOfferte' => $this->_aziendaModel]);

    }

    public function indexPacchetti()
    {
        /*
        prendo tutte le offerte del db con le relative aziende, è simile un join tra azienda e offerta
        sfrutta le funzioni offertw() e azienda() nei model
        */

//        $offerte = Offerta::with('azienda')->get();
//
//SELECT * FROM partecipa JOIN offerta on partecipa.IDOfferta = offerta.IDOfferta JOIN azienda on azienda.IDAzienda = offerta.IDOfferta;
        $partecipazioni = DB::table('partecipa')
            ->join('offerta', 'partecipa.IDOfferta', '=', 'Offerta.IDOfferta')
            ->join('Azienda', 'Azienda.IDAzienda', '=', 'Offerta.IDOfferta')
            ->select('partecipa.*', 'Offerta.*', 'Azienda.*')
            ->get();

        //SELECT * FROM Pacchetto join partecipa on Pacchetto.IDPacchetto = partecipa.Pacchetto;
        $pacchetti = Pacchetto::paginate(12);
        $aziende = Azienda::orderBy('RagioneSociale', 'asc')->get()->pluck('RagioneSociale', 'IDAzienda');

        return view('level0.catalogo.catalogoPacchetti', ['pacchetti' => $pacchetti, 'partecipazioni' => $partecipazioni, 'aziende' => $aziende]);

    }

    public function searchCatalogo(CatalogoRequest $request)
    {
        $searchbar = $request->input('searchbar');
        $selectAzienda = $request->input('select-aziende');
        $aziende = Azienda::orderBy('RagioneSociale', 'desc')->get()->pluck('RagioneSociale', 'IDAzienda');

        if ($searchbar != '' and $selectAzienda != '') {
            $azienda = $this->_aziendaModel->getAziendaById($selectAzienda);
            $offerte = $this->_offertaModel->getOfferteByAziendaAndDescrizione($searchbar, $selectAzienda); //passo l'id dell'azienda e il testo inserito nella searchbar


            return view('level0.catalogo.catalogo', ['aziende' => $aziende, 'ricerca' => $searchbar . ' di ' . $azienda->RagioneSociale, 'offerte' => $offerte]);
        } else if ($searchbar == '' and $selectAzienda != '') {
            $azienda = $this->_aziendaModel->getAziendaById($selectAzienda);
            $offerte = $this->_offertaModel->getOfferteByAziendaId($selectAzienda);

            return view('level0.catalogo.catalogo', ['aziende' => $aziende, 'ricerca' => $azienda->RagioneSociale, 'offerte' => $offerte]);
        } else if ($searchbar != '' and $selectAzienda == '') {
            $offerte = $this->_offertaModel->getOfferteByDescrizione($searchbar);
            return view('level0.catalogo.catalogo', ['aziende' => $aziende, 'ricerca' => $searchbar, 'offerte' => $offerte]);

        }


    }

    public function searchCatalogoAbbinate(CatalogoRequest $request)
    {
        $searchbar = $request->input('searchbar');
        $selectAzienda = $request->input('select-aziende');
        $aziende = Azienda::orderBy('RagioneSociale', 'desc')->get()->pluck('RagioneSociale', 'IDAzienda');

        $pacchetti = Pacchetto::paginate(10);
        if ($searchbar != '' and $selectAzienda != '') {
//            PER OGNI OFFERTA TROVATA CHE APPARTIENE ALL'AZIENDA SPECIFICATA PRENDE I PACCHETTI DI CUI FA PARTE E MOSTRA ANCHE LE ALTRE AZIENDE

            //SELECT * FROM partecipa JOIN offerta on partecipa.IDOfferta = offerta.IDOfferta JOIN azienda on azienda.IDAzienda = offerta.IDOfferta and  azienda.IDAzienda = $IDAzienda

            $azienda = $this->_aziendaModel->getAziendaById($selectAzienda);
            $offerte = Offerta::where('Azienda', '!=', $selectAzienda)
                ->join('partecipa', 'Offerta.IDOfferta', '=', 'partecipa.IDOfferta')
                ->join('Azienda', 'Azienda.IDAzienda', '=', 'Offerta.Azienda')->get();

//SELECT * from partecipa join offerta ON partecipa.IDOfferta = offerta.IDOfferta join azienda on azienda.IDAzienda = offerta.IDOfferta and azienda.IDAzienda = $IDAzienda WHERE offerta.Descrizione REGEXP $searchbar or offerta.Titolo REGEXP $searchbar;
            $partecipazioni = DB::table('partecipa')
                ->join('offerta', 'partecipa.IDOfferta', '=', 'offerta.IDOfferta')
                ->join('azienda', 'azienda.IDAzienda', '=', 'offerta.Azienda')
                ->where('azienda.IDAzienda', '=', $selectAzienda)
                ->where('offerta.Descrizione', 'REGEXP', $searchbar)
                ->orWhere('offerta.Titolo', 'REGEXP', $searchbar)
                ->select('partecipa.*', 'offerta.*', 'azienda.*')
                ->get();
            return view('level0.catalogo.catalogoPacchetti', ['offerte' => $offerte, 'aziende' => $aziende, 'ricerca' => $searchbar . ' di ' . $azienda->RagioneSociale, 'pacchetti' => $pacchetti, 'partecipazioni' => $partecipazioni]);
        } else if ($searchbar == '' and $selectAzienda != '') {
//            $azienda = $this->_aziendaModel->getAziendaById($selectAzienda);
//            $offerte = $this->_offertaModel->getOfferteByAziendaId($selectAzienda);


            $azienda = $this->_aziendaModel->getAziendaById($selectAzienda);

            $offerte = Offerta::where('Azienda', '!=', $selectAzienda)
                ->join('partecipa', 'Offerta.IDOfferta', '=', 'partecipa.IDOfferta')
                ->join('Azienda', 'Azienda.IDAzienda', '=', 'Offerta.Azienda')->get();
            $partecipazioni = DB::table('partecipa')
                ->join('offerta', 'partecipa.IDOfferta', '=', 'offerta.IDOfferta')
                ->join('azienda', 'azienda.IDAzienda', '=', 'offerta.Azienda')
                ->where('azienda.IDAzienda', '=', $selectAzienda)
                ->select('partecipa.*', 'offerta.*', 'azienda.*')
                ->get();
            return view('level0.catalogo.catalogoPacchetti', ['offerte' => $offerte, 'aziende' => $aziende, 'ricerca' => $azienda->RagioneSociale, 'pacchetti' => $pacchetti, 'partecipazioni' => $partecipazioni]);
//            return view('level0.catalogo.catalogo', ['aziende' => $aziende, 'ricerca' => $azienda->RagioneSociale, 'offerte' => $offerte]);
        } else if ($searchbar != '' and $selectAzienda == '') {

            $offerte = Offerta::join('partecipa', 'Offerta.IDOfferta', '=', 'partecipa.IDOfferta')
                ->join('Azienda', 'Azienda.IDAzienda', '=', 'Offerta.Azienda')->get();

//SELECT * from partecipa join offerta ON partecipa.IDOfferta = offerta.IDOfferta join azienda on azienda.IDAzienda = offerta.IDOfferta and azienda.IDAzienda = $IDAzienda WHERE offerta.Descrizione REGEXP $searchbar or offerta.Titolo REGEXP $searchbar;
            $partecipazioni = DB::table('partecipa')
                ->join('offerta', 'partecipa.IDOfferta', '=', 'offerta.IDOfferta')
                ->join('azienda', 'azienda.IDAzienda', '=', 'offerta.Azienda')
                ->where('offerta.Descrizione', 'REGEXP', $searchbar)
                ->orWhere('offerta.Titolo', 'REGEXP', $searchbar)
                ->select('partecipa.*', 'offerta.*', 'azienda.*')
                ->get();
            return view('level0.catalogo.catalogoPacchetti', ['offerte' => $offerte, 'aziende' => $aziende, 'ricerca' => $searchbar, 'pacchetti' => $pacchetti, 'partecipazioni' => $partecipazioni]);


//            $offerte = $this->_offertaModel->getOfferteByDescrizione($searchbar);
//            return view('level0.catalogo.catalogo', ['aziende' => $aziende, 'ricerca' => $searchbar, 'offerte' => $offerte]);

        }


    }


    public function showOfferta($IDOfferta)
    {
        if (Offerta::find($IDOfferta)) {
            $offerta = $this->_offertaModel->getOffertaById($IDOfferta);

            //calcolo il prezzo scontato e lo arrotondo a 2 cifre decimali.
            $sconto = ($offerta->Prezzo / 100) * $offerta->Sconto;
            $prezzoScontato = $offerta->Prezzo - $sconto;
            $prezzoScontato = number_format($prezzoScontato, 2);

            $azienda = $this->_aziendaModel->getAziendaById($offerta->Azienda);


            return view('level0.catalogo.offerta.offerta', ['offerta' => $offerta, 'prezzoScontato' => $prezzoScontato, 'azienda' => $azienda]);
        } else {
            abort(404, 'Pagina non trovata');
        }
    }


    public function showOffertaAbbinata($IDPacchetto)
    {

        /*

        SELECT *
        FROM offerta
        JOIN azienda ON offerta.Azienda = azienda.IDAzienda
        JOIN (  SELECT *
                FROM Pacchetto
                JOIN Partecipa ON Pacchetto.IDPacchetto = Partecipa.Pacchetto
                WHERE Pacchetto.IDPacchetto = $IDPacchetto
             ) AS partecipanti ON offerta.IDOfferta = partecipanti.IDOfferta;

        */

        if (Pacchetto::find($IDPacchetto)) {
            $pacchetto = DB::table('offerta')
                ->join('azienda', 'offerta.Azienda', '=', 'azienda.IDAzienda')
                ->join('Partecipa', 'offerta.IDOfferta', '=', 'Partecipa.IDOfferta')
                ->join('Pacchetto', 'Partecipa.Pacchetto', '=', 'Pacchetto.IDPacchetto')
                ->where('Pacchetto.IDPacchetto', $IDPacchetto)
                ->select('*', 'Offerta.Descrizione AS offerta_descrizione')
                ->get();


            return view('level0.catalogo.offerta.offerta', ['pacchetto' => $pacchetto]);
        } else {
            abort(404, 'Pagina non trovata');
        }
    }


    public function salvaCoupon($IDOfferta)
    {
        $username = Auth::user()->username;

        $coupon = new Coupon();

        if ($coupon->checkIfExists($IDOfferta, $username)) {
            return redirect()->route('couponError')->with('message', 'ERRORE! visualizzi questo perché è stato
                 trovato un coupon associato al tuo account per questa offerta! controlla la tua area personale.');
        } else {
            $coupon->Utente = $username;
            $coupon->IDOfferta = $IDOfferta;
//            $coupon->Utente = $username;

            $codiceCoupon = Str::random(10); // Genera una stringa casuale di 10 caratteri

            while (Coupon::where('IDCoupon', $codiceCoupon)->exists()) {
                $codiceCoupon = Str::random(10); // Genera un nuovo codice se quello generato esiste già
            }
            $coupon->IDCoupon = $codiceCoupon;
            $coupon->save();
            $offerta = Offerta::find($IDOfferta);

            $azienda = $this->_aziendaModel->getAziendaById($offerta->Azienda);
            return view('level0.catalogo.offerta.offerta', ['coupon' => $coupon, 'offerta' => $offerta, 'azienda' => $azienda]);
        }
    }

    public function salvaCouponPacchetto($IDPacchetto)
    {
        $username = Auth::user()->username;

        $couponPacchetto = new CouponPacchetto();

        if ($couponPacchetto->checkIfExists($IDPacchetto, $username)) {
            return redirect()->route('couponError')->with('message', 'ERRORE! visualizzi questo perché è stato
                 trovato un coupon associato al tuo account per questa offerta! controlla la tua area personale.');
        } else {
            $couponPacchetto->Utente = $username;
            $couponPacchetto->Pacchetto = $IDPacchetto;

//            $coupon->Utente = $username;

            $codiceCoupon = Str::random(10); // Genera una stringa casuale di 10 caratteri

            while (CouponPacchetto::where('IDCoupon', $codiceCoupon)->exists()) {
                $codiceCoupon = Str::random(10); // Genera un nuovo codice se quello generato esiste già
            }
            $couponPacchetto->IDCoupon = $codiceCoupon;
            $couponPacchetto->save();
            $pacchetto = Pacchetto::find($IDPacchetto);


            $pacchetto = $pacchetto = DB::table('offerta')
                ->join('azienda', 'offerta.Azienda', '=', 'azienda.IDAzienda')
                ->join('Partecipa', 'offerta.IDOfferta', '=', 'Partecipa.IDOfferta')
                ->join('Pacchetto', 'Partecipa.Pacchetto', '=', 'Pacchetto.IDPacchetto')
                ->where('Pacchetto.IDPacchetto', $IDPacchetto)
                ->select('*', 'Offerta.Descrizione AS offerta_descrizione')
                ->get();

//            $azienda = $this->_aziendaModel->getAziendaById($offerta->Azienda);
            return view('level0.catalogo.offerta.offerta', ['couponPacchetto' => $couponPacchetto, 'pacchetto' => $pacchetto]);
        }
    }

    public function errore()
    {
        $messaggio = session('message');
        return view('errors.couponError', ['message' => $messaggio]);
    }

}
