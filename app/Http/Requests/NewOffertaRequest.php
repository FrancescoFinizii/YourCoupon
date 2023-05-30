<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOffertaRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'Titolo' => 'required|max:30',
            'Prezzo' => 'required',
            'Sconto' => 'required|integer|min:1|max:99',
            'Azienda' => 'required|integer',
            'Inizio' => 'required|date',
            'Scadenza' => 'required|date',
            'Fruizione' => 'required|max:30',
            'Descrizione' => 'required|max:2500',
            'FotoProd' => 'nullable',
        ];
    }

}
