<?php

namespace App\Http\Requests\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'registration' => 'required|unique:vehicles',
            'kilometer' => 'required|numeric',
            'date_of_manufacture' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Veuillez renseignez une désignation.",
            'brand.required' => "Veuillez renseignez la marque du véhicule.",
            'model.required' => "Veuillez renseignez le model du véhicule.",
            'registration.required' => "Veuillez renseignez la plaque d'immatriculation.",
            'registration.unique' => "Cette plaque d'immatriculation est déja renseignée.",
            'kilometer.required' => "Veuillez renseignez le kilométrage du véhicule.",
            'kilometer.numeric' => "Veuillez renseignez un kilométrage valide.",
            'date_of_manufacture.date' => "Veuillez renseignez une date valide.",
            'date_of_manufacture.required' => "Veuillez renseignez une date."
        ];
    }
}