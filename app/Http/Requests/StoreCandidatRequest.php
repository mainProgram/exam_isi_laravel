<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatRequest extends FormRequest
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
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'age' => 'required|numeric|min:12|max:35',
            'niveau_etude' => "required|min:3",
            'email' => "required|email|unique:candidats",
            'sexe' => "required|string",
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prénom est requis',
            'niveau_etude.required' => 'Le niveau d\'étude est requis',
            'age.required' => 'L\'âge est requis',
            'email.required' => 'L\'email est requis',
            'email.unique' => 'L\'email est unique',
            'nom.min' => 'Taille minimum de 2',
            'niveau_etude.min' => 'Taille minimum de 3',
            'prenom.min' => 'Taille minimum de 2',
            'age.min' => 'Âge minimum de 12',
            'age.max' => 'Âge maximum de 35',
            'email.email' => 'Email invalide',
        ];
    }
}
