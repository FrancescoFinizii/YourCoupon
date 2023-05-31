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

    public function modificaPassword(Request $request)
    {
        $staffMember= Auth::utente();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');

        if ($staffMember->modificaPassword($oldPassword, $newPassword)) {
            return redirect()->back()->with('success', 'La password è stata cambiata con successo');
        } else {
            return redirect()->back()->with('error', 'La vecchia password non è corretta');
        }
    }
}
