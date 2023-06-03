<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StaffMemberController extends Controller
{
    public function mostraModificaPasswordForm()
    {
        return view('level2/cambia_password');
    }

    public function salvaModificaPassword(NewPasswordRequest $request)
    {
        $utente= Auth::utente();

        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');

        if ($utente->modificaPassword($oldPassword, $newPassword)) {
            return redirect()->back()->with('success', 'La password è stata cambiata con successo');
        } else {
            return redirect()->back()->with('error', 'La vecchia password non è corretta');
        }
    }
}
