<?php

namespace App\Http\Controllers;

use App\Models\Utente;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit($id)
    {

        $utente = Utente::find($id);

        return view('level1.user-information')
            ->with('utente', $utente);
    }


    /**
     * Aggiorna la risorsa Book con l'id fornito sul database coi dati inviati
     */
    public function update(Request $request, $id)
    {
        $utente = Utente::find($id);
        // redirect
        Session::flash('message', 'Successfully created user!');
        $utente->update($request->all());

        return redirect()->route('utente.edit')
            ->with('utente',$utente);


    }

    /**
     * Elimina la risorsa Book con l'id fornito sul database
     */
    public function destroy($id)
    {
        $utente = Utente::find($id);
        $utente->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the User!');
        return Redirect::to('level0/home');
    }
}
