<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\CrudFaqRequests\NewFaqRequest;
use Illuminate\Http\Request;


class CrudFaqController extends Controller
{
    protected $_faqModel;

    public function __construct()
    {
//        $this->faqs = Faq::all();
        $this->_faqModel = Faq::paginate(5);
    }

    public function showCrud()
    {
        return view('level3.faq.crud_faq.crudfaq', ['faqs' => $this->_faqModel]);
    }

    public function insertFaq()
    {
        return view('level3.faq.crud_faq.editFaq');
    }


    public function storeFaq(NewFaqRequest $request)
    {
        // Elaborazione dei dati della form e salvataggio nel database
        $faq = new Faq();

        $faq->domanda = $request->input('domanda');
        $faq->risposta = $request->input('risposta');
        $faq->save();

//        return redirect()->route('crud-faq');

        return redirect()->route('eseguita')->with('message', 'Nuova FAQ inserita con successo');
//        ->with('success','Faq aggiunta con successo')
    }

    public function modifyFaq(Request $request)
    {
        try {
            $faqId = $request->input('faq_id');
            $faq = Faq::findOrFail($faqId);

//        in base al valore del submit button cliccato eseguo una diversa operazione
            switch ($request->submitbutton) {
                case 'Modifica FAQ selezionata':
                    return view('level3.faq.crud_faq.editFaq', ['faq' => $faq]);
//mettere il metodo che salva la modifica
                case 'Elimina FAQ selezionata':
                    $faq->delete();
                    return redirect()->route('eseguita')->with('message', 'FAQ rimossa con successo');
//                    return view('level3.faq.crud_faq.operazioneEseguita')->with('message', 'FAQ rimossa con successo');
//                    return redirect()->route('crud-faq');
            }
        } catch (Exception $e) {
            return response('Errore durante l\'aggiornamento della faq', 500);
        }
    }

    public function eseguita(){
        $messaggio = session('message');

        return view('level3.faq.crud_faq.operazioneEseguita', ['message' => $messaggio]);
    }

    public function updateFaq(NewFaqRequest $request)
    {
        try {
            $id = $request->input('id');
            $domanda = $request->input('domanda');
            $risposta = $request->input('risposta');

            $faq = Faq::findOrFail($id);
            $faq->domanda = $domanda;
            $faq->risposta = $risposta;
            $faq->save();

            return redirect()->route('eseguita')->with('message', 'FAQ aggiornata con successo');

//            return view('level3.faq.crud_faq.operazioneEseguita')->with('message', 'FAQ aggiornata con successo');

//            return response()->json(['message' => 'Faq aggiornata con successo'], 200);
        } catch (\Exception $e) {
            return redirect()->route('eseguita')->with('message', 'Errore durante l\'aggiornamento della faq');
        }

        return redirect()->route('crud-faq');
    }
}
