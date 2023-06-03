<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAziendaRequest;
use App\Models\Azienda;
use Illuminate\Http\Request;

class AziendaController extends Controller
{

    protected $_azzModel;

    public function mostraAzienda($id)
    {
        $azienda = Azienda::find($id);

        return view('level0.azienda', compact('azienda'));
    }

    public function showAllAzz()
    {
        // Recupera tutto lo staff dal database
        $this->_azzModel = Azienda::paginate(7);

        // Ritorna la vista con l'elenco degli utenti
        return view('level3.crud_aziende.crud_aziende', ['aziende' => $this->_azzModel]);
    }

    public function creaAzz()
    {
        return view('level3.crud_aziende.inserisci_azienda');
    }

    public function salvaAzz(NewAziendaRequest $request)
    {

        $azienda = new Azienda;

        if ($request->hasFile('Logo')) {
            $logo = $request->file('Logo');
            $logoname = $logo->getClientOriginalName();
        } else {
            $logoname = null;
        }

        $azienda->fill($request->validated());
        $azienda->Logo = $logoname;
        $azienda->save();

        if ($logoname !== null) {
            $destinationPath = public_path() . '/img/logos';
            $logo->move($destinationPath, $logoname);
        }

        return response()->json(['redirect' => route('crud_aziende')]);
    }

    public function modificaAzz($IDAzienda)
    {
        $azienda = Azienda::where('IDAzienda', $IDAzienda)->first();

        if (!$azienda) {
            // Gestisci il caso in cui l'azienda non esista
            abort(404);
        }

        return view('level3.crud_aziende.modifica_azienda', ['azienda' => $azienda]);
    }

    public function salvaModificaAzz(NewAziendaRequest $request, $IDAzienda)
    {
        $azienda = Azienda::findOrFail($IDAzienda);

        $logoname = $azienda->Logo;
        $oldlogoname = $azienda->Logo;

        // Aggiorna il valore di ProPic se è stato inviato un nuovo file
        if ($request->hasFile('Logo')) {
            $logo = $request->file('Logo');
            $logoname = $logo->getClientOriginalName();
        }

        $azienda->fill($request->validated());
        $azienda->Logo = $logoname;

        // Salva le modifiche nel database
        $azienda->save();

        if($logoname !== null && $oldlogoname !== $azienda->Logo){
            $destinationPath = public_path() . '/img/logos';
            $logo->move($destinationPath, $logoname);
        }

        return redirect()->action([AziendaController::class, 'showAllAzz']);
    }

    public function eliminaAzienda($idAzz)
    {
        // Trova l'utente nel database
        $azienda = Azienda::where('IDAzienda', $idAzz)->firstOrFail();

        if ($azienda->vincoliRelazionali()->count() > 0) {
            // L'azienda è coinvolta in vincoli di integrità referenziale
            return redirect()->back()->withErrors(['error' => 'Errore. Azienda coinvolta in vincoli di integrità referenziale.']);
        }

        // Elimina l'azienda
        $azienda->delete();

        // Ritorna alla vista desiderata dopo l'eliminazione
        return redirect()->action([AziendaController::class, 'showAllAzz']);
    }
}
