<?php

namespace App\Http\Requests\Capturs;

use Illuminate\Foundation\Http\FormRequest;

class StoreCapturRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'device' => 'required','string','unique:capturs',
            'vehicle_id' => 'nullable|exists:vehicle,id'
        ];
    }

    public function messages()
    {
        return [
            'device.required' => "Veuillez renseignez une clé.",
            'device.string' => "Veuillez renseignez une clé valide.",
            'device.unique' => "Cette clé est déja renseignée."
        ];
    }
}
