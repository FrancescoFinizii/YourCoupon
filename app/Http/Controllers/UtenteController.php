<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModUtenteRequest;
use App\Http\Requests\NewUtenteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Utente;

class UtenteController extends Controller
{
    protected $_staffModel;

    public function showAllUser()
    {
        // Recupera tutto lo staff dal database
        $this->_userModel = Utente::where('Livello', 1)->paginate(5);

        // Ritorna la vista con l'elenco degli utenti
        return view('level3.gestione_liv1.gestione_liv_1', ['utenti' => $this->_userModel]);
    }

    public function showAllStaff()
    {
        // Recupera tutto lo staff dal database
        $this->_staffModel = Utente::where('Livello', 2)->paginate(5);

        // Ritorna la vista con l'elenco degli utenti
        return view('level3.crud_staff.crud_staff', ['staff' => $this->_staffModel]);
    }

    public function creaStaff() {
        return view('level3.crud_staff.inserisci_staff');
    }

    public function salvaStaff(NewUtenteRequest $request) {

        $utente = new Utente;

        if ($request->hasFile('ProPic')) {
            $propic = $request->file('ProPic');
            $propicname = $propic->getClientOriginalName();
        } else {
            $propicname = null;
        }

        $utente->Livello = 2;
        $utente->fill($request->validated());
        $utente->ProPic = $propicname;
        $utente->save();

        if($propicname !== null){
            $destinationPath = public_path() . '/img/user';
            $propic->move($destinationPath, $propicname);
        }

        return redirect()->action([UtenteController::class, 'showAllStaff']);
    }

    public function modificaStaff($username)
    {
        $utente = Utente::where('Username', $username)->first();

        if (!$utente) {
            // Gestisci il caso in cui l'utente non esista
            abort(404);
        }

        return view('level3.crud_staff.modifica_staff', ['utente' => $utente]);
    }

    public function salvaModificaStaff(NewUtenteRequest $request, $username)
    {
        $utente = Utente::findOrFail($username);


        // Aggiorna il valore di ProPic se è stato inviato un nuovo file
        if ($request->hasFile('ProPic')) {
            $propic = $request->file('ProPic');
            $propicname = $propic->getClientOriginalName();
        } else {
            $propicname = null;
        }

        $utente->fill($request->validated());
        $utente->ProPic = $propicname;

        // Salva le modifiche nel database
        $utente->save();

        if($propicname !== null){
            $destinationPath = public_path() . '/img/user';
            $propic->move($destinationPath, $propicname);
        }

        return redirect()->action([UtenteController::class, 'showAllStaff']);
    }

    public function eliminaStaff($username)
    {
        // Trova l'utente nel database
        $utente = Utente::where('Username', $username)->firstOrFail();

        // Elimina l'utente
        $utente->delete();

        // Ritorna alla vista desiderata dopo l'eliminazione
        return redirect()->action([UtenteController::class, 'showAllStaff']);
    }

    public function eliminaUtente($username)
    {
        // Trova l'utente nel database
        $utente = Utente::where('Username', $username)->firstOrFail();

        // Elimina l'utente
        $utente->delete();

        // Ritorna alla vista desiderata dopo l'eliminazione
        return redirect()->action([UtenteController::class, 'showAllUser']);
    }
}
