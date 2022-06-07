<?php

namespace App\Http\Requests\Capturs;

use Illuminate\Validation\Rule;
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
            'device' => ['required', 'string', Rule::unique('capturs')->whereNull('deleted_at')],
            'battery' => 'nullable',
            'vehicle_id' => 'nullable|integer'
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
