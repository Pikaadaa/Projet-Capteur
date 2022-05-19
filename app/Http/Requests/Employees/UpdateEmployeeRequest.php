<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'birthday_at' => 'nullable','date_format:"d-m-Y"',
            'image' => 'nullable','image','size:500'
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
            'bithday_at.date_format:"d-m-Y"' => "Veuillez renseignez une date au format(j/m/aaaa)",
            'image.image' => "Veuillez renseignez une image de type jpg, jpeg, png, bmp, gif, svg, ou webp",
            'image.size' => "Image trop volumineuse"
        ];
    }
}
