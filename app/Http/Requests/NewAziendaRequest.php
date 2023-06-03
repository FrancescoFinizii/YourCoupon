<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;


class NewAziendaRequest extends FormRequest {

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
            'RagioneSociale' => 'required|max:50',
            'Sede' => 'required|max:50',
            'Tipologia' => 'required|max:50',
            'Descrizione' => 'required|max:2500',
            'Mail' => 'required|email|max:50',
            'Link' => 'required|max:200',
            'Telefono' => 'required|numeric|regex:/^\d{10}$/',
            'Logo' => 'nullable'
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
