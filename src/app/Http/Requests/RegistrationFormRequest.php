<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'data.Adresse' => 'required|string',
            'data.Loginname' => 'required|string',
            'data.Nachname' => 'required|string',
            'data.Passwort' => 'required|string|min:6|max:10',
            #'data.Passwort_Bestaetigung' => 'required|string|min:6|max:10|same:Passwort',
            'data.PLZ' => 'required|int|digits:5',
            'data.Vorname' => 'required|string',
            'data.Email' => 'required|email'
        ];
    }

}
