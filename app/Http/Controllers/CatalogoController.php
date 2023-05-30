<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Azienda;
use App\Models\Offerta;


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
    public function index(){
      /*  $aziendeConOfferte = array();
        foreach ($this->_aziendaModel as $azienda) {
            $hasOfferte = false;

            foreach ($this->_offertaModel as $offerta) {
                if ($azienda->IDAzienda === $offerta->Azienda) {
                    $hasOfferte = true;
                    break;
                }
            }

            if ($hasOfferte) {
                $aziendeConOfferte[] = $azienda;
            }
        }*/
        /*
        - Azienda::has('offerte') è per cercare le istanze del modello Azienda che hanno almeno una offerta associata.
        - with('offerte') indica di prendere anche le offerte relative ad ogni azienda insieme alle istanze di Azienda,
          cosi si può accedere alle offerte associate ad ogni azienda in modo rapido.
        - paginate(5) esegue la paginazione dei risultati ottenuti. Cosi imposto il numero di risultati per pagina a 5
          che poi gestisco con il paginator.
        */

        $this->_aziendaModel = Azienda::has('offerte')->with('offerte')->paginate(5);

        return view('level0.catalogo.catalogo',  ['aziendeConOfferte' => $this->_aziendaModel]);

    }

    public function searchCatalogo(Request $request){
        $this->_offertaModel = Offerta::searchOfferte($request->input('searchbar'));
        return view('level0.catalogo.catalogocerca', ['offerte' => $this->_offertaModel, 'ricerca' => $request->input('searchbar')]);
    }

    public function showOfferta($IDOfferta){
        $offerta = $this->_offertaModel->getOffertaById($IDOfferta);

        //calcolo il prezzo scontato e lo arrotondo a 2 cifre decimali.
        $sconto = ($offerta->Prezzo/ 100) * $offerta->Sconto;
        $prezzoScontato = $offerta->Prezzo - $sconto;
        $prezzoScontato = number_format($prezzoScontato, 2);

        $azienda = $this->_aziendaModel->getAziendaById($offerta->Azienda);

        return view('level0.catalogo.offerta.offerta', ['offerta'=>$offerta, 'prezzoScontato'=>$prezzoScontato, 'azienda'=>$azienda]);
    }

}
