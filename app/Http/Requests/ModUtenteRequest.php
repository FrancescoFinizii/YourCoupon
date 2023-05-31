<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;


class ModUtenteRequest extends FormRequest {

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
            'password' => 'required|min:8',
            'Livello' => 'integer|min:1|max:2',
            'Nome' => 'required|max:30',
            'Cognome' => 'required|max:30',
            'Email' => 'required|email|max:50',
            'Nascita' => 'required|date',
            'Genere' => 'required|max:5',
            'Telefono' => 'required|numeric|regex:/^\d{10}$/',
            'ProPic' => 'nullable',
        ];
    }

    /**
     * Override: response in formato JSON
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
