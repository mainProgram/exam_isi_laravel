<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'libelle' => "required|unique:types,libelle",
        ];
    }

    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé est requis',
            'libelle.unique' => 'Le libellé doit être unique !',
        ];
    }
}
