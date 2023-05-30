<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
{
    public function authorize() {

        return true;
    }
    public function rules() {
        return [
            'password' => 'required|max:25',
            'newpassword' => 'required',
            'confirmnewpassword' => 'required|max:25',
        ];
    }
}
