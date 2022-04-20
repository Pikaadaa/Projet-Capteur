<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => 'required','string',
            'last_name' => 'required','string',
            'function' => 'required','string',
            'birthday_at' => 'required','date_format:"d-m-Y"'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => "Veuillez renseignez un prénom.",
            'first_name.string' => "Veuillez renseignez un prénom valide.",
            'last_name.required' => "Veuillez renseignez un nom.",
            'last_name.string' => "Veuillez renseignez un nom valide.",
            'function.required' => "Veuillez renseignez une fonction.",
            'function.string' => "Veuillez renseignez une fonction valide.",
            'bithday_at.required' => "Veuillez renseignez une date",
            'bithday_at.date_format:"d-m-Y"' => "Veuillez renseignez une date au format(j/m/aaaa)"
        ];
    }
}
