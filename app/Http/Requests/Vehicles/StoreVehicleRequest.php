<?php

namespace App\Http\Requests\Vehicles;

use Illuminate\Validation\Rule;
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
            'registration' => ['required', Rule::unique('vehicles')->whereNull('deleted_at')],
            'kilometer' => 'required|numeric|min:0',
            'year_of_manufacture' => 'required','numeric',
            'date_of_establishment' => 'required','date_format:"d-m-Y"',
            'employee_id' => 'nullable|exists:employees,id'
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
            'kilometer.min' => "Veuillez renseignez un kilométrage valide.",
            'year_of_manufacture.required' => "Veuillez renseignez l'année d'acquisition du véhicule.",
            'year_of_manufacture.numeric' => "Veuillez renseignez une année valide.",
            'date_of_establishment.date' => "Veuillez renseignez une date valide.",
            'date_of_establishment.required' => "Veuillez renseignez une date."
        ];
    }
}
