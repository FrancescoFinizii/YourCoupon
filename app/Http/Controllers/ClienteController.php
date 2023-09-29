<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Utente;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ClienteController extends Controller
{

    /**
     * Mostra l'elenco dei clienti presenti nel database
     */
    public function index(Request $request)
    {
        $clienti = Cliente::paginate(10);

        if($request->ajax()){
            return view('admin.cliente-table', compact('clienti'))->render();
        }
        return view('admin.cliente-index',compact('clienti'));
    }

    public function search(Request $request)
    {
        $utenti = Utente::whereHasMorph('utenteable', [Cliente::class], function (Builder $query) use ($request) {
            $query->where("username", "LIKE", "%". $request->username . "%");
        })->take(10)->get();

        return view("admin.cliente-search", compact("utenti"))->render();
    }


    /**
     * Mostra il form per creare un nuovo cliente
     */
    public function create()
    {
        return view("public.login");
    }


    /**
     * Salva un nuovo cliente nel database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'username' => 'required|alpha_dash|min:8|max:30|unique:utente,username',
            'email' => 'required|email:rfc,dns|max:60|unique:cliente,email',
            'telefono' => 'required|digits:10',
            'dataNascita' => 'required|date|before: -18 years|after: -75 years|size:10',
            'genere' => ['required', Rule::in(['Non specificato', 'Uomo', 'donna'])],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $cliente = Cliente::create($request->only(["nome", "cognome", "email", "telefono", "dataNascita", "genere", "foto"]));

        $utente = $cliente->utente()->create($request->only("username", "password"));

        if ($request->has("foto")) {
            $foto = StorageController::StoreImage($request->file("foto"), $cliente->id, "client");
        }
        else {
            $foto = "storage/avatar.png";
        }

        $cliente->update(["foto" => $foto]);

        Auth::login($utente);

        return redirect()->route("cliente.edit.profile");
    }


    /**
     * Fornisce la pagina in cui è possibile modificare le informazioni personali del cliente
     */
    public function editProfile()
    {
        return view("cliente.cliente-edit-profile");
    }


    /**
     * Fornisce la pagina in cui è possibile modificare la password del cliente
     */
    public function editPassword()
    {
        return view("cliente.cliente-edit-password");
    }


    /**
     * Aggiorna la risorsa cliente con i dati inviati
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'username' => ['required', 'alpha_dash', 'min:8', 'max:30', Rule::unique("utente", "username")->ignore(Auth::user())],
            'email' => ['required', 'email:rfc,dns', 'max:60', Rule::unique("cliente", "email")->ignore(Auth::user()->utenteable)],
            'telefono' => 'required|digits:10',
            'dataNascita' => 'required|date|before: -18 years|after: -75 years|size:10',
            'genere' => ['required', Rule::in(['Non specificato', 'Uomo', 'donna'])],
        ]);
        Auth::user()->update($request->only("username"));
        Auth::user()->utenteable->update($request->except("username"));
        return redirect()->back()->with('success','Dati aggiornati correttamente');
    }


    /**
     * Aggiorna la password della risorsa cliente
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
     * Aggiorna la foto profilo del cliente
     */
    public function updateImage(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $foto = StorageController::updateImage($request->file("foto"), Auth::user()->utenteable->id, "client");
        Auth::user()->utenteable->update(["foto" => $foto]);

        return redirect()->back()->with('success','Immagine del profilo aggiornata correttamente!');
    }


    /**
     * Elimina i clienti selezionati dal database
     */
    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        Utente::where("utenteable_type", "App\Models\Cliente")->whereIn("utenteable_id", $ids)->delete();
        Cliente::whereIn("id", $ids)->delete();
        foreach ($ids as $id) {
            StorageController::FindAndDeleteImage($id, "client");
        }
        return response()->json(['url'=>route("cliente.index")]);
    }


    /**
     * Elimina tutti i clienti dal database
     */
    public function deleteAll()
    {
        Utente::where("utenteable_type", "App\Models\Cliente")->delete();
        DB::table('cliente')->delete();
        StorageController::deleteDirectory(public_path("storage/client"));
        return redirect()->route("cliente.index");
    }
}
