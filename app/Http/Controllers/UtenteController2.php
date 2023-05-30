<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUtenteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Utente;

class UtenteController2 extends Controller
{
    protected $_staffModel;



    public function showAllStaff()
    {
        // Recupera tutto lo staff dal database
        $this->_staffModel = Utente::where('Livello', 2)->get();

        $this->_staffModel = Utente::paginate(5);

        // Ritorna la vista con l'elenco degli utenti
        return view('crud_staff.crud_staff', ['staff' => $this->_staffModel]);
    }



    public function modificaStaff(NewUtenteRequest $request)
    {
        try {
            $username = $request->input('Username');
            $password = $request->input('Password');
            $nome = $request->input('Nome');
            $cognome = $request->input('Cognome');
            $nascita = $request->input('Nascita');
            $genere = $request->input('Genere');
            $telefono = $request->input('Telefono');
            $email = $request->input('Email');
            $propic = $request->input('ProPic');

            $staff = Utente::findOrFail($username);
            $staff->username = $username;
            $staff->password = $password;
            $staff->nome = $nome;
            $staff->cognome = $cognome;
            $staff->nascita = $nascita;
            $staff->genere = $genere;
            $staff->telefono = $telefono;
            $staff->email = $email;
            $staff->propic = $propic;
            $staff->save();

            return redirect()->route('crud_staff');
        } catch (\Exception $e) {
            return redirect()->route('crud_staff');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    /*
     public function storeUtente(Request $request)
    {
        $utente = new Utente;
        $utente->Username = $request->input('Username');
        $utente->Password = $request->input('Password');
        $utente->Livello = $request->input('Livello');
        $utente->Nome = $request->input('Nome');
        $utente->Cognome = $request->input('Cognome');
        $utente->Email = $request->input('Email');
        $utente->Nascita = $request->input('Nascita');
        $utente->Genere = $request->input('Genere');
        $utente->Telefono = $request->input('Telefono');
        $utente->ProPic = $request->input('ProPic');

        $utente->save();

    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    /*
    public function showUtente($id)
    {
        $utente = Utente::find($id);

        if (!$utente) {
            return response()->json([
                'message' => 'Utente non trovato'
            ], 404);
        }

//        return response()->json($utente, 200);
    }
    */
}
