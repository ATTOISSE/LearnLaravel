<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'libelle' => ['required'],
            'prix' => ['required'],
            'quantite' => ['required'],
            'categorie_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'libelle.required' => 'Le champ :attribute est obligatoire.',
            'prix.required' => 'Le champ :attribute est obligatoire.',
            'quantite.required' => 'Le champ :attribute est obligatoire.',
            'categorie_id.required' => 'Le champ :attribute est obligatoire.',
        ];
    }
}