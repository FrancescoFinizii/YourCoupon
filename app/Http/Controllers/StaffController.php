<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StaffController extends Controller
{

    /**
     * Mostra l'elenco dei membri dello staff presenti nel database
     */
    public function index()
    {
        return view("admin.staff-index", ["staffs" => Staff::paginate(10)]);
    }


    /**
     * Mostra il form per creare un nuovo membro dello staff
     */
    public function create()
    {
        return view("admin.staff-create");

    }


    /**
     * Salva un nuovo membro dello staff nel database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'username' => 'required|alpha_dash|min:8|max:30|unique:utente,username',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $foto = "storage/avatar.png";

        $staff = Staff::create(array_merge($request->only("nome", "cognome"), ["foto" => $foto]));

        $staff->utente()->create($request->only("username", "password"));

        if ($request->hasFile("foto")) {
            $foto = StorageController::storeImage($request->file("foto"), $staff->id, "staff");
            $staff->update(["foto" => $foto]);
        }

        return redirect()->route("staff.index");
    }



    /**
     * Mostra il form per modificare il membro dello staff
     */
    public function edit($id)
    {
        return view("admin.staff-edit", ["staff" => Staff::find($id)]);
    }


    /**
     * Fornisce la pagina in cui è possibile modificare le informazioni personali del membro dello staff
     */
    public function editProfile()
    {
        return view("staff.staff-edit-profile");
    }


    /**
     * Fornisce la pagina in cui è possibile modificare la password del membro dello staff
     */
    public function editPassword()
    {
        return view("staff.staff-edit-password");
    }


    /**
     * Aggiorna il membro dello staff sul database con i dati inviati
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'username' => ["required", "alpha_dash", "min:8", "max:30",  Rule::unique('utente', 'username')->ignore($staff->utente)],
            'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->filled("password")) {
            $request->validate([
                'password_confirmation' => 'required'
            ]);
            $staff->utente->update($request->only("password"));
        }

        $staff->utente->update($request->only("username"));

        $staff->update($request->only("nome", "cognome"));

        if ($request->has("foto")) {
            $foto = StorageController::updateImage($request->file("foto"), $staff->id, "staff");
            $staff->update(["foto" => $foto]);
        }

        return redirect()->route("staff.index");
    }


    /**
     * Aggiorna le informazioni personali del membro dello staff sul database con i dati inviati
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'username' => ['required', 'alpha_dash', 'min:8', 'max:30', Rule::unique("utente", "username")->ignore(Auth::user())],
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->has("foto")) {
            $foto = StorageController::updateImage($request->file("foto"), Auth::user()->utenteable->id, "staff");
            Auth::user()->utenteable->update(["foto" => $foto]);
        }

        Auth::user()->utenteable->update($request->only("nome", "cognome"));

        Auth::user()->update($request->only("username"));

        return redirect()->back()->with('success','Dati aggiornati correttamente');
    }


    /**
     * Aggiorna la password del membro dello staff sul database
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required|current_password',
            'password' => ['required', 'confirmed', 'different:oldPassword', Password::min(8)->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required'
        ]);

        Auth::user()->update(["password" => $request->password]);
        return redirect()->back()->with('success','Password aggiornata correttamente!');
    }


    /**
     * Elimina il membro dello stqff dal database
     */
    public function destroy(Staff $staff)
    {
        StorageController::FindAndDeleteImage($staff->id, "staff");
        $staff->utente->delete();
        $staff->delete();
        return redirect()->route("staff.index");
    }
}
