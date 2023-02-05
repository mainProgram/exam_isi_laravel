<?php

namespace App\Http\Requests;

use App\Models\Referentiel;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreReferentielRequest extends FormRequest
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
            'libelle' => [
                'required',
                Rule::unique('referentiels')
                    ->where(function ($query) {
                        return $query->where('type_id', request('type_id'));
                    })
            ],
            'horaire' => "numeric|min:1"
        ];
    }

    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé est requis',
            'libelle.unique' => 'Le libellé est déjà pris pour ce type !',
            'horaire.min' => 'L\'horaire est incorrect !',
        ];
    }
}
