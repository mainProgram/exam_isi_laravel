<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFormationRequest extends FormRequest
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
            'nom' => [
                'required',
                'min:5',
                Rule::unique('formations')
                    ->where(function ($query) {
                        return $query->where('referentiel_id', request('referentiel_id'));
                    })
            ],
            'description' => "required|min:10",
            'duree' => "min:1",
            'date_debut' => "required|after:".date('Y-m-d'),
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est requis',
            'nom.unique' => 'Le nom est déjà pris pour ce référentiel',
            'nom.min' => 'Taille minimum de 5',
            'description.min' => 'Taille minimum de 10',
            'description.required' => 'La description est requise',
            'date_debut.required' => 'La date de début est requise',
            'date_debut.after' => 'La date de début est incorrecte',
            'duree.min' => 'La durée est incorrecte',
        ];
    }
}
