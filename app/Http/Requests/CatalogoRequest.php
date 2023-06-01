<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Validation\Rules\RequiredIf;
use mysql_xdevapi\Exception;

class CatalogoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'searchbar'=> 'required_without:select-aziende',
            'select-aziende' => 'required_without:searchbar'
        ];
    }


}
