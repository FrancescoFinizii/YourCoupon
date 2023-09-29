<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Offerta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class OffertaController extends Controller
{

    /**
     * Mostra l'elenco delle offerte presenti nel database
     */
    public function index()
    {
        return view("staff.offerta-index", ["offerte" => Offerta::paginate(10)]);
    }


    /**
     * Mostra il form per creare una nuova offerta
     */
    public function create()
    {
        $aziende = Azienda::simplePaginate(10);
        return view("staff.offerta-create", compact("aziende"));
    }


    /**
     * Mostra il primo step creare una nuova offerta
     * In questo step si seleziona l'azienda di riferimento per la nuova offerta
     */
    public function stepOne()
    {
        $aziende = Azienda::simplePaginate(10);
        return view("staff.offerta-create-step-one", compact("aziende"));
    }


    /**
     * Mostra il secondo step creare una nuova offerta
     * In questo step si compilano le specifiche dell'offerta
     */
    public function stepTwo(Request $request)
    {
        $azienda = Azienda::find($request->AziendaID);
        return view("staff.offerta-create-step-two", compact("azienda"));
    }


    /**
     * Ricerca un'offerta sia scaduta che attiva all'interno del database
     */
    public function search(Request $request)
    {
        $offerte = Offerta::where("oggetto", "LIKE", "%" .$request->oggetto . "%")->take(10)->get();
        return view("admin.offerta-search", compact("offerte"))->render();
    }


    /**
     * Ricerca un'offerta attiva all'interno del database
     */
    public function searchPromo(Request $request) {
        $today = Carbon::today()->format("Y-m-d");
        if ($request->filled("search")) {
            $result = Offerta::where(function ($query) use ($request) {
                $query->where('oggetto', 'like', "%$request->search%")
                    ->orWhereHas('azienda', function (Builder $q) use ($request) {
                        $q->where('ragioneSociale', 'like',  "%$request->search%");
                    });
                })
                ->whereDate('emissione', '<=', $today)
                ->whereDate('scadenza', '>=', $today)->paginate(5);
        }
        else {
            $result = Offerta::paginate(5);
        }
        return view("public/promo", ["offerte" => $result]);
    }


    /**
     * Salva una nuova offerta nel database
     */
    public function store(Request $request)
    {
        $request->validate([
            'oggetto' => 'required',
            'emissione' => 'required|date|after: yesterday|before: +1years|size:10',
            'scadenza' => 'required|date|after: emissione|before: +3years|size:10',
            'prezzo' => 'required|decimal:0,2|min:0|lt:100000000',
            'sconto' => 'required|integer|min:0|max:100',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'descrizione' => 'nullable',
        ]);

        $azienda = Azienda::find($request->AziendaID);

        $offerta = $azienda->offerta()->create($request->all());

        if ($request->hasFile("foto")) {
            $foto = StorageController::StoreImage($request->file("foto"), $offerta->id, "offerta");
            $offerta->update(["foto" => $foto]);
        }

        return redirect()->route("offerta.index");
    }


    /**
     * Mostra la pagina con i dettagli dell'offerta
     */
    public function show($id)
    {
        $offerta = Offerta::findOrFail($id);
        return view("public/promo-show", compact("offerta"));
    }


    /**
     * Mostra il form per modificare l'offerta
     */
    public function edit(Offerta $offerta)
    {
        return view("staff.offerta-edit", ["offerta" => $offerta]);
    }


    /**
     * Aggiorna l'offerta sul database con i dati inviati
     */
    public function update(Request $request, Offerta $offerta)
    {
        $request->validate([
            'oggetto' => 'required',
            'emissione' => 'required|date|after: yesterday|before: +1years|size:10',
            'scadenza' => 'required|date|after: emissione|before: +3years|size:10',
            'prezzo' => 'required|decimal:0,2|min:0|lt:100000000',
            'sconto' => 'required|integer|min:0|max:100',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'descrizione' => 'nullable',
        ]);

        $offerta->update($request->except("foto"));

        if ($request->hasFile("foto")) {
            $foto = StorageController::StoreImage($request->file("foto"), $offerta->id, "offerta");
            $offerta->update(["foto" => $foto]);
        }

        return redirect()->route("offerta.index");
    }


    /**
     * Elimina l'offerta dal database
     */
    public function destroy($id)
    {
        Offerta::findOrFail($id)->delete();
        return redirect()->route("offerta.index");
    }
}
