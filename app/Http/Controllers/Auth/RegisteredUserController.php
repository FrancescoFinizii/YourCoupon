<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Models\User;
use App\Models\Utente;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nome' => ['required', 'string', 'max:255'],
            'Cognome' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Nascita' => ['required', 'date'],
            'Telefono' => ['required', 'string', 'max:10'],
            'Genere' => ['required', 'string', 'max:5'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

//            'Nome' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'Username' => ['required', 'string', 'max:255', 'unique:users'],
//            'Password' => ['required', 'confirmed', Rules\Password::defaults()],

            ]);

        $user = Utente::create([
            'Nome' => $request->Nome,
            'Cognome' => $request->Cognome,
            'username' => $request->username,
            'Email' => $request->Email,
            'Nascita' => $request->Nascita,
            'Telefono' => $request->Telefono,
            'Genere' => $request->Genere,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
