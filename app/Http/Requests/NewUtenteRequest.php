<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUtenteRequest extends FormRequest {

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
            'Username' => 'required|max:50',
            'Password' => 'required',
            'Livello' => 'integer|min:1|max:2',
            'Nome' => 'required|max:30',
            'Cognome' => 'required|max:30',
            'Email' => 'required|max:50',
            'Nascita' => 'required|date',
            'Genere' => 'required|max:5',
            'Telefono' => 'required|max:10',
            'ProPic' => 'nullable',
        ];
    }

}
