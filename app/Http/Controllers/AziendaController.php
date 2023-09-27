<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;

class AziendaController extends Controller
{

    /**
     * Mostra l'elenco delle aziende presenti nel database
     */
    public function index()
    {
        return view("admin.azienda-index", ["aziende" => Azienda::paginate(10)]);
    }


    /**
     * Mostra il form per creare una nuova azienda
     */
    public function create()
    {
        return view("admin.azienda-create");

    }


    /**
     * Ricerca un'azienda presente nel database
     */
    public function search(Request $request)
    {
        $aziende = Azienda::where("ragioneSociale", "LIKE", "%" . $request->ragioneSociale . "%")->get();

        return view('staff.azienda-search', compact('aziende'))->render();
    }


    /**
     * Salva una nuova azienda nel database
     */
    public function store(Request $request)
    {
        $request->validate([
            'ragioneSociale' => 'required|alpha:ascii|max:50',
            'sede' => 'required|alpha:ascii|max:50',
            'tipologia' => 'required|max:50',
            'descrizione' => 'nullable',
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $azienda = Azienda::create($request->except("logo"));

        $logo = StorageController::StoreImage($request->file("logo"), $azienda->id, "aziende");

        $azienda->update(["logo" => $logo]);

        return redirect()->route("azienda.index");
    }


    /**
     * Mostra il form per modificare l'azienda
     */
    public function edit($id)
    {
        return view("admin.azienda-edit", ["azienda" => Azienda::find($id)]);
    }


    /**
     * Aggiorna l'azienda sul database con i dati inviati
     */
    public function update(Request $request, Azienda $azienda)
    {
        $request->validate([
            'ragioneSociale' => 'required|alpha:ascii|max:50',
            'sede' => 'required|alpha:ascii|max:50',
            'tipologia' => 'required|max:50',
            'descrizione' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $azienda->update($request->except("logo"));


        if ($request->has("logo")) {
            $logo = StorageController::updateImage($request->file("logo"), $azienda->id, "aziende");
            $azienda->update(["logo" => $logo]);
        }

        return redirect()->route("azienda.index");
    }


    /**
     * Elimina l'azienda dal database
     */
    public function destroy(Azienda $azienda)
    {
        StorageController::FindAndDeleteImage($azienda->id, "aziende");
        $azienda->delete();
        return redirect()->route("azienda.index");
    }
}
