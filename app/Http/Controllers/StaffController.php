<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Utente;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller

{

    public function editProfile($username)
    {
        $utente = Utente::find($username);
        return view("level2.profilo_staff")
            ->with('utente', $utente);
    }

    public function editPassword($username)
    {
        $utente = Utente::find($username);

        return view("level2.cambia_password")
            ->with('utente', $utente);
    }

    /**
     * Aggiorna la risorsa Book con l'id fornito sul database coi dati inviati
     */
    public function updateProfile(Request $request, $username)
    {
        $utente = Utente::find($username);
        $val = $request->validate([
            'Nome' => 'required|max:30',
            'Cognome' => 'required|max:30',
            'Email' => 'required|email|max:50',
            'Nascita' => 'required|date',
            'Telefono' => 'required|numeric|regex:/^\d{10}$/',
            'ProPic' => 'nullable',
        ]);
        $utente->fill($val)->update();
        return redirect()->back();
    }

    public function updatePassword(Request $request, $username)

    {
        $utente = Utente::find($username);

        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:8|confirmed|different:oldPassword',
            'password_confirmation' => 'required| min:8'
        ]);

        if(Hash::check($request->oldPassword , $utente->password)) {
            $utente->fill([
                'password' => Hash::make($request->password)
            ])->update();
            return redirect()->back()->with('success','Password changed successfully!');
        }
        else
            return redirect()->back()->withErrors(['msg' => 'Password attuale non valida.']);
    }
}
