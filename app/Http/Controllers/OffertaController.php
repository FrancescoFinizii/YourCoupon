<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOffertaRequest;
use App\Models\Azienda;
use App\Models\Offerta;

class OffertaController extends Controller
{
    protected $_aziendaModel;
    protected $_offertaModel;

    public function showAllOfferte(){

        // Recupera tutte le offerte dal database
        $this->_offertaModel = Offerta::paginate(4);

        $aziende = Azienda::pluck('RagioneSociale', 'IDAzienda')->toArray();

        // Ritorna la vista con l'elenco delle offerte
        return view('level3.crud_offerte.crud_offerte', ['offerte' => $this->_offertaModel, 'aziende' => $aziende]);
    }

    public function creaOff(){
        $aziende = Azienda::pluck('RagioneSociale', 'IDAzienda')->toArray();
        return view('level3.crud_offerte.inserisci_offerta', ['aziende' => $aziende]);
    }

    public function salvaOff(NewOffertaRequest $request){

        $offerta = new Offerta;

        if ($request->hasFile('FotoProd')) {
            $logo = $request->file('FotoProd');
            $logoname = $logo->getClientOriginalName();
        } else {
            $logoname = null;
        }

        $offerta->fill($request->validated());
        $offerta->FotoProd = $logoname;
        $offerta->save();

        if($logoname !== null){
            $destinationPath = public_path() . '/img/fotoProds';
            $logo->move($destinationPath, $logoname);
        }

        return redirect()->action([OffertaController::class, 'showAllOfferte']);
    }

    public function modificaOff($IDOfferta)
    {
        $offerta = Offerta::where('IDOfferta', $IDOfferta)->first();

        if (!$offerta) {
            // Gestisci il caso in cui l'utente non esista
            abort(404);
        }

        $aziende = Azienda::pluck('RagioneSociale', 'IDAzienda')->toArray();


        return view('level3.crud_offerte.modifica_offerta', ['offerta' => $offerta, 'aziende' => $aziende]);
    }

    public function salvaModificaOff(NewOffertaRequest $request, $IDOfferta)
    {
        $offerta = Offerta::findOrFail($IDOfferta);


        // Aggiorna il valore di ProPic se è stato inviato un nuovo file
        if ($request->hasFile('FotoProd')) {
            $fotoprod = $request->file('FotoProd');
            $fotoprodname =  $fotoprod->getClientOriginalName();
        } else {
            $fotoprodname = null;
        }

        $offerta->fill($request->validated());
        $offerta->FotoProd = $fotoprodname;

        // Salva le modifiche nel database
        $offerta->save();

        if($fotoprodname !== null){
            $destinationPath = public_path() . '/img/fotoProds';
            $fotoprod->move($destinationPath, $fotoprodname);
        }

        return redirect()->action([OffertaController::class, 'showAllOfferte']);
    }

    public function eliminaOfferta($idOff)
    {
        // Trova l'utente nel database
        $offerta = Offerta::where('IDOfferta', $idOff)->firstOrFail();

        // Elimina l'utente
        $offerta->delete();

        // Ritorna alla vista desiderata dopo l'eliminazione
        return redirect()->action([OffertaController::class, 'showAllOfferte']);
    }
}
